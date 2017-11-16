<?php /* Template Name: Aktuelles Liste */ ?>

<?php get_header(); ?>

<?php wp_title(''); ?>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

  <?php
  query_posts(array(
    'post_type' => 'aktuelles'
  ) );

  while (have_posts()) : the_post();
  ?>

    <div class="post">
      <?php include(locate_template('inc/title-link.php')); ?>

      <?php
			$image = get_field('vorschau_bild');
			include(locate_template('inc/image-main.php'));
			?>

      <?php
			$kurzer_text = get_field('kurzer_text');
			include(locate_template('inc/text-kurz.php'));
			?>
    </div>

  <?php
  endwhile;
  ?>

</div>

<?php get_footer(); ?>
