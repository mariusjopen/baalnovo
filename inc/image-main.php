<!-- IMAGE MAIN -->
<div class="main-image">
  <?php
  $image = get_field('vorschau_bild');
  $size = '_768';

  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>
