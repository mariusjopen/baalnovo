<?php /* Template Name: Download Liste */ ?>

<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));
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
