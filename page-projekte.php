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

      <a href="<?php the_permalink() ?>">
        <?php the_title(); ?>
      </a>

      <div class="vorschau">
        <?php
        $image = get_field('vorschau_bild');
        $size = '_768';
        if( $image ) {
          echo wp_get_attachment_image( $image, $size );
        }
        ?>

        <p><?php echo get_field('kurzer_text'); ?></p>

      </div>

    </div>

  <?php
  endwhile;
  ?>
</div>


<?php get_footer(); ?>
