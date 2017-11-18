<?php /* Template Name: Aktuelles Liste */ ?>

<?php get_header(); ?>

<?php wp_title(''); ?>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

	<?php
	include(locate_template('inc/vorschau-aktuelles.php'));
	?>

</div>

<?php get_footer(); ?>
