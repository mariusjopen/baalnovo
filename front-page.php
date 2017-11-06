<?php get_header(); ?>

<p>Start</p>

<div class="main-image">
  <?php
  $id = get_id_by_slug('start');

  $image = get_field('vorschau_bild',$id);
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>



<div class="content">
  <?php
  query_posts(array(
    'post_type' => 'aktuelles'
  ) );

  while (have_posts()) : the_post();
  ?>

    <div class="post">

      <a href="<?php the_permalink() ?>">
        <?php the_title(); ?>
      </a>

      <?php
      if( have_rows('vorschau') ):
        while( have_rows('vorschau') ): the_row();

          $image = get_sub_field('vorschau_bild');
          $size = '_768';
          if( $image ) {
            echo wp_get_attachment_image( $image, $size );
          }
          ?>

          <p><?php echo get_sub_field('kurzer_text'); ?></p>

        <?php
        endwhile;
      endif;
      ?>

    </div>

  <?php
  endwhile;
  ?>
</div>

<?php get_footer(); ?>
