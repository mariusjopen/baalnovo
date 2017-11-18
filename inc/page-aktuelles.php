<?php /* Template Name: Aktuelles Liste */ ?>

<?php get_header(); ?>

<?php wp_title(''); ?>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

	<div class="vorschau-aktuelles">
	  <?php
	  query_posts(array(
	    'post_type' => 'aktuelles'
	  ) );

	  while (have_posts()) : the_post();
	  ?>

	    <div class="vorschau-aktuell">

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
