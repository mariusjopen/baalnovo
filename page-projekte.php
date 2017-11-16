<?php /* Template Name: Projekte Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
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
