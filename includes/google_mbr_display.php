<!-- Google My Business Reviews Widget, by Daan van den Bergh | Semster -->

<?php 
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
?>

<div class="metaBlock" style="text-align: <?php echo $gmbr_text_align; ?>; ">
	<div itemscope itemtype="http://schema.org/LocalBusiness">
		<meta itemprop="name" content="Semster" />
		<div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
		<div class="<?php echo $gmbr_icons; echo round($roundrating, -1, PHP_ROUND_HALF_UP); ?>" style="<?php echo $gmbr_icons_align; ?>"></div> 
			<meta itemprop="worstRating" content="1">
			<?php if ($gmbr_rating_scale == 5): ?>
            	<?php echo $gmbr_intro_text; ?> <span itemprop="ratingValue"><?php echo $rating; ?></span><?php if ($gmbr_display_scale == 1) { echo '/' . $gmbr_rating_scale; } ?>!
            	<meta itemprop="bestRating" content="5"><br>
			<?php elseif ($gmbr_rating_scale == 10): ?>
            	<?php echo $gmbr_intro_text; ?>  <span itemprop="ratingValue"><?php echo $rating *2; ?></span><?php if ($gmbr_display_scale == 1) { echo '/' . $gmbr_rating_scale; } ?>!
            	<meta itemprop="bestRating" content="10"><br>
			<?php endif; ?>
			<?php if ($gmbr_display_reviews == 1): ?>
				<?php if ($gmbr_link_to_reviews == 1): ?>
                	<span class="user_ratings_total"><?php _e('Gebaseerd op: ', 'google_mbr_widget'); ?> <a href="<?php echo $link_to_reviews; ?>" target="_blank" class="reviewlink"><span itemprop="ratingCount" content="<?php echo $user_ratings_total; ?>"><?php echo $user_ratings_total; ?></span> <?php _e('reviews', 'google_mbr_widget'); ?></a>.</span>
                <?php elseif ($gmbr_link_to_reviews == 0): ?>
                	<span class="user_ratings_total"><?php _e('Gebaseerd op: ', 'google_mbr_widget'); ?> <span itemprop="ratingCount" content="<?php echo $user_ratings_total; ?>"><?php echo $user_ratings_total; ?></span> <?php _e('reviews', 'google_mbr_widget'); ?>.</span>
				<? endif; ?>
			<?php elseif ($gmbr_display_reviews == 0): ?>
                <meta itemprop="ratingCount" content="<?php echo $user_ratings_total; ?>">
			<?php endif; ?>
		</div>
	</div>
</div>        
