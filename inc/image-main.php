<!-- START IMAGE MAIN -->
<div class="image-main">
  <?php
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>
<!-- END IMAGE MAIN -->
