<?php /* Template Name: Projekte Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php include(locate_template('inc/image-main.php')); ?>

<div class="content">

  <?php
  query_posts(array(
    'post_type' => 'projekte'
  ) );

  while (have_posts()) : the_post();
  ?>

    <div class="post">

    	<?php include(locate_template('inc/title-link.php')); ?>

      <div class="vorschau">
        <?php include(locate_template('inc/image-main.php')); ?>
				
				<?php
				$kurzer_text = get_field('kurzer_text');
				include(locate_template('inc/text-kurz.php'));
				?>
      </div>

    </div>

  <?php
  endwhile;
  ?>

</div>

<?php get_footer(); ?>
