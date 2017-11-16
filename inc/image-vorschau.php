<!-- START IMAGE VORSCHAU -->
<div class="image-vorschau">
  <?php
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>
<!-- END IMAGE VORSCHAU -->
