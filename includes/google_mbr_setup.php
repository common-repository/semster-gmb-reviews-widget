<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
?>

<p>
<label for="<?php echo $this->get_field_id('gmbr_title'); ?>"><?php _e('Widget-title', 'google_mbr_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('gmbr_title'); ?>" name="<?php echo $this->get_field_name('gmbr_title'); ?>" type="text" value="<?php echo $gmbr_title; ?>" />
</p>

<h4>
<?php _e('Required', 'google_mbr_widget'); ?>
</h4>

<p>
<label for="<?php echo $this->get_field_id('gmbr_api'); ?>"><?php _e('Google API-key:', 'google_mbr_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('gmbr_api'); ?>" name="<?php echo $this->get_field_name('gmbr_api'); ?>" type="text" value="<?php echo $gmbr_api; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('gmbr_id'); ?>"><?php _e('Google Place ID:', 'google_mbr_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('gmbr_id'); ?>" name="<?php echo $this->get_field_name('gmbr_id'); ?>" type="text" value="<?php echo $gmbr_id; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('gmbr_sc'); ?>"><?php _e('Google Places Search Query:', 'google_mbr_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('gmbr_sc'); ?>" name="<?php echo $this->get_field_name('gmbr_sc'); ?>" type="text" value="<?php echo $gmbr_sc; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('gmbr_lrd'); ?>"><?php _e('Google Places LRD:', 'google_mbr_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('gmbr_lrd'); ?>" name="<?php echo $this->get_field_name('gmbr_lrd'); ?>" type="text" value="<?php echo $gmbr_lrd; ?>" />
</p>

<h4>
<?php _e('Lay-out Settings', 'google_mbr_widget'); ?>
</h4>

<p>
<label for="<?php echo $this->get_field_id('gmbr_text_align'); ?>"><?php _e('Text-align: ', 'google_mbr_widget'); ?></label>
<select name="<?php echo $this->get_field_name('gmbr_text_align'); ?>" id="<?php echo $this->get_field_id('gmbr_text_align'); ?>" class="widefat">
<?php
	$options = array('left', 'center', 'right');
	foreach ($options as $option) {
		echo ' <option value="' . $option . '" id="' . $option . '"',
				$gmbr_text_align == $option ? ' selected="selected"' : '', 
				'>' . $option . '</option>';
	}
?>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('gmbr_intro_text'); ?>"><?php _e('Text before rating:', 'google_mbr_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('gmbr_intro_text'); ?>" name="<?php echo $this->get_field_name('gmbr_intro_text'); ?>" type="text" value="<?php echo $gmbr_intro_text; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('gmbr_icons'); ?>"><?php _e('Icons to display: ', 'google_mbr_widget'); ?></label>
<select name="<?php echo $this->get_field_name('gmbr_icons'); ?>" id="<?php echo $this->get_field_id('gmbr_icons'); ?>" class="widefat">
<?php
	$options = array('stars', 'thumbs', 'squares');
	foreach ($options as $option) {
		echo ' <option value="' . $option . '" id="' . $option . '"',
				$gmbr_icons == $option ? ' selected="selected"' : '', 
				'>' . $option . '</option>';
	}
?>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('gmbr_icons_align'); ?>"><?php _e('Icons alignment: ', 'google_mbr_widget'); ?></label>
<select name="<?php echo $this->get_field_name('gmbr_icons_align'); ?>" id="<?php echo $this->get_field_id('gmbr_icons_align'); ?>" class="widefat">
<?php
	$options = array('left', 'center', 'right');
	foreach ($options as $option) {
		echo ' <option value="' . $option . '" id="' . $option . '"',
				$gmbr_icons_align == $option ? ' selected="selected"' : '', 
				'>' . $option . '</option>';
	}
?>
</select>
</p>

<p>
<input id="<?php echo esc_attr($this->get_field_id('gmbr_display_reviews')); ?>" name="<?php echo esc_attr($this->get_field_name('gmbr_display_reviews')); ?>" type="checkbox" value="1" <?php checked($gmbr_display_reviews, 1); ?>/>
<label for="<?php echo esc_attr($this->get_field_id('gmbr_display_reviews')); ?>"><?php _e('Display no. of reviews?', 'google_mbr_widget' ); ?></label>
</p>

<p>
<input id="<?php echo esc_attr($this->get_field_id('gmbr_link_to_reviews')); ?>" name="<?php echo esc_attr($this->get_field_name('gmbr_link_to_reviews')); ?>" type="checkbox" value="1" <?php checked($gmbr_link_to_reviews, 1); ?>/>
<label for="<?php echo esc_attr($this->get_field_id('gmbr_link_to_reviews')); ?>"><?php _e('Insert external link to Google Reviews?', 'google_mbr_widget' ); ?></label>
</p>

<p>
<input id="<?php echo esc_attr($this->get_field_id('gmbr_display_scale')); ?>" name="<?php echo esc_attr($this->get_field_name('gmbr_display_scale')); ?>" type="checkbox" value="1" <?php checked($gmbr_display_scale, 1); ?>/>
<label for="<?php echo esc_attr($this->get_field_id('gmbr_display_scale')); ?>"><?php _e('Display rating scale?', 'google_mbr_widget' ); ?></label>
</p>

<p>
<label for="<?php echo $this->get_field_id('gmbr_rating_scale'); ?>"><?php _e('Rating scale: ', 'google_mbr_widget'); ?></label>
<select name="<?php echo $this->get_field_name('gmbr_rating_scale'); ?>" id="<?php echo $this->get_field_id('gmbr_rating_scale'); ?>" class="widefat">
<?php
	$options = array(5, 10);
	foreach ($options as $option) {
		echo ' <option value="' . $option . '" id="' . $option . '"',
				$gmbr_rating_scale == $option ? ' selected="selected"' : '', 
				'>' . $option . '</option>';
	}
?>
</select>
</p>