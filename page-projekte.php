<?php /* Template Name: Projekte Liste */ ?>

<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));
?>

<div class="content">

	<div class="vorschau-projekte">
	  <?php
	  query_posts(array(
	    'post_type' => 'projekte'
	  ) );

	  while (have_posts()) : the_post();
	  ?>

	    <div class="vorschau-projekt">

				<?php
				include(locate_template('inc/vorschau-aktuelles.php'));
				?>

	    </div>

	  <?php
	  endwhile;
	  ?>
	</div>

</div>

<?php get_footer(); ?>
