<?php /* Template Name: Stücke Liste */ ?>

<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));
?>

<div class="content">

	<?php
	include(locate_template('inc/stuecke-filter.php'));
	?>

</div>

<?php get_footer(); ?>
