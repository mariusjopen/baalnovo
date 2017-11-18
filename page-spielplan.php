<?php /* Template Name: Spielplan Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

	<?php
	include(locate_template('inc/events-spielplan.php'));
	?>

</div>


<?php get_footer(); ?>
