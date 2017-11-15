<?php /* Template Name: Download Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<div class="main-image">
  <?php
  $image = get_field('vorschau_bild');
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>

<div class="content">
lalalsss

</div>


<?php get_footer(); ?>
