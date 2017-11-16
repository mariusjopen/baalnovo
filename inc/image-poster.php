<!-- START IMAGE POSTER -->
<div class="image-poster">
  <?php
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>
<!-- END IMAGE POSTER -->
