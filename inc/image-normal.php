<!-- START IMAGE NORMAL -->
<div class="image-normal">
  <?php
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>
<!-- END IMAGE NORMAL -->
