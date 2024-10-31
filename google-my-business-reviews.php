<?php
/*
Plugin Name: Google My Business Reviews Widget
Plugin URI: http://dev.daanvandenbergh.com/wordpress-plugins/google-my-business-reviews/
Description: A widget to show off your Google My Business Reviews rating.
Version: 0.7.5
Author: Daan van den Bergh | Semster
Author URI: http://dev.daanvandenbergh.com/
License: GPLv2 or later
*/

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class google_mbr extends WP_Widget {
	
	// Create constructor
	function google_mbr() {
		parent::WP_Widget(false, $name = __('Google My Business Reviews', 'google_mbr_widget') );
	}

	// Create widget form
	function form($instance) {	
		// Check if values are entered. Otherwise display empty.
		if($instance) {
			 $gmbr_title = esc_attr($instance['gmbr_title']);
			 $gmbr_api = esc_attr($instance['gmbr_api']);
			 $gmbr_id = esc_attr($instance['gmbr_id']);
			 $gmbr_sc = esc_attr($instance['gmbr_sc']);
			 $gmbr_lrd = esc_attr($instance['gmbr_lrd']);
			 $gmbr_text_align = esc_attr($instance['gmbr_text_align']);
			 $gmbr_display_reviews = esc_attr($instance['gmbr_display_reviews']);
			 $gmbr_intro_text = esc_attr($instance['gmbr_intro_text']);
			 $gmbr_icons = esc_attr($instance['gmbr_icons']);
			 $gmbr_icons_align = esc_attr($instance['gmbr_icons_align']);
			 $gmbr_link_to_reviews = esc_attr($instance['gmbr_link_to_reviews']);
			 $gmbr_rating_scale = esc_attr($instance['gmbr_rating_scale']);
			 $gmbr_display_scale = esc_attr($instance['gmbr_display_scale']);
		} else {
			 $gmbr_title = '';
			 $gmbr_api = '';
			 $gmbr_id = '';
			 $gmbr_sc = '';
			 $gmbr_lrd = '';
			 $gmbr_text_align = '';
			 $gmbr_display_reviews = '';
			 $gmbr_intro_text = '';
			 $gmbr_icons = '';
			 $gmbr_icons_align = '';
			 $gmbr_link_to_reviews = '';
			 $gmbr_rating_scale = '';
			 $gmbr_display_scale = '';
		}
		
		// Load setup fields
		require(plugin_dir_path(__FILE__) . 'includes/google_mbr_setup.php');
	}

	// Configure update procedure
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		// Set values of fields
			$instance['gmbr_title'] = strip_tags($new_instance['gmbr_title']);
			$instance['gmbr_api'] = strip_tags($new_instance['gmbr_api']);
			$instance['gmbr_id'] = strip_tags($new_instance['gmbr_id']);
			$instance['gmbr_sc'] = strip_tags($new_instance['gmbr_sc']);
			$instance['gmbr_lrd'] = strip_tags($new_instance['gmbr_lrd']);
			$instance['gmbr_text_align'] = strip_tags($new_instance['gmbr_text_align']);
			$instance['gmbr_display_reviews'] = strip_tags($new_instance['gmbr_display_reviews']);
			$instance['gmbr_intro_text'] = strip_tags($new_instance['gmbr_intro_text']);
			$instance['gmbr_icons'] = strip_tags($new_instance['gmbr_icons']);
			$instance['gmbr_icons_align'] = strip_tags($new_instance['gmbr_icons_align']);
			$instance['gmbr_link_to_reviews'] = strip_tags($new_instance['gmbr_link_to_reviews']);
			$instance['gmbr_rating_scale'] = strip_tags($new_instance['gmbr_rating_scale']);
			$instance['gmbr_display_scale'] = strip_tags($new_instance['gmbr_display_scale']);

		return $instance;
	}

	// Front-end of widget
	function widget($args, $instance) {
		extract( $args );
		
		// Load style-sheet (in next update: option to use own css)
		wp_enqueue_style('gmbr_widget', plugin_dir_url(__FILE__) . 'google-my-business-reviews.css', 10);
	   
		// Create variables for required options
		$gmbr_title = apply_filters('widget_title', $instance['gmbr_title']);
		$gmbr_api = $instance['gmbr_api'];
		$gmbr_id = $instance['gmbr_id'];
		$gmbr_sc = $instance['gmbr_sc'];
		$gmbr_lrd = $instance['gmbr_lrd'];
		
		// Create variables for layout-options
		$gmbr_text_align = $instance['gmbr_text_align'];
		$gmbr_display_reviews = $instance['gmbr_display_reviews'];
		$gmbr_intro_text = $instance['gmbr_intro_text'];
		$gmbr_icons = $instance['gmbr_icons'];
		$gmbr_icons_align = $instance['gmbr_icons_align'];
		$gmbr_link_to_reviews = $instance['gmbr_link_to_reviews'];
		$gmbr_rating_scale = $instance['gmbr_rating_scale'];
		$gmbr_display_scale = $instance['gmbr_display_scale'];
		
		// Check if fields have been filled and generate Google-API and -Search URL
		if ($gmbr_title) {
			echo $before_title . $gmbr_title . $after_title;
		}
		if($gmbr_api && $gmbr_id) {
			$google_api_url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $gmbr_id . "&key=" . $gmbr_api;
		} else {
			$google_api_url = '';
		}
		if($gmbr_sc && $gmbr_lrd) {
			$gmbr_sc = str_replace(" ", "+", $gmbr_sc);
			$link_to_reviews = 'https://www.google.nl/?gws_rd=ssl#q=' . $gmbr_sc . '&lrd=' . $gmbr_lrd;
		} else {
			$link_to_reviews = '';
		}
		
		// Get output from Google API and save to $output
		$ch = curl_init();  
			curl_setopt($ch,CURLOPT_URL, $google_api_url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			$output = curl_exec($ch);
		curl_close($ch);
		
		// Create variables from API-output
		$rating = json_decode($output)->result->rating;
		// V 0.7: Fix for perfect score on Google Reviews
		if (!$rating) {
			$rating = 5;
		}
		
		$user_ratings_total = count(json_decode($output)->result->reviews);
		$roundrating = (round($rating * 2) / 2) * 10;
		
		switch($gmbr_icons_align) {
			case 'left':
				$gmbr_icons_align = 'margin-left: 0; margin-right: auto;';
				break;
			case 'right':
				$gmbr_icons_align = 'margin-left: auto; margin-right: 0;';
				break;
			case 'center':
				$gmbr_icons_align = 'margin: 0 auto;';
				break;
		}

		// Display widget				
		echo $before_widget;
		
		echo '<div class="widget-text google_mbr_widget_box">';
		require(plugin_dir_path(__FILE__) . 'includes/google_mbr_display.php');
		echo '</div>';		   
		
		echo $after_widget;
	}
}

// Register widget
add_action('widgets_init', create_function('', 'return register_widget("google_mbr");'));

?>