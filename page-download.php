<?php /* Template Name: Download Liste */ ?>

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
	$download = 'projekte';
	$download_name = 'Projekte';
	include(locate_template('inc/download.php'));

	$download = 'stuecke';
	$download_name = 'Stücke';
	include(locate_template('inc/download.php'));

	$download = 'ensemble';
	$download_name = 'Ensemble';
	include(locate_template('inc/download.php'));
	?>

</div>



<?php get_footer(); ?>
