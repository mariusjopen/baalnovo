<?php /* Template Name: Spielplan Liste */ ?>

<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));

$id = get_id_by_slug('aktuelles-liste');

$image = get_field('vorschau_bild', $id);
include(locate_template('inc/image-main.php'));

$video = get_field('vorschau_video', $id);
include(locate_template('inc/video-main.php'));

include(locate_template('inc/header-wrapper.php'));
?>

<div class="content">

	<?php
	include(locate_template('inc/events-spielplan.php'));
	?>

</div>


<?php get_footer(); ?>
