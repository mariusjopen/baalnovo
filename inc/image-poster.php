<!-- START IMAGE POSTER -->
<div class="image-poster">
  <?php
  $image = get_field('poster');
  $size = '_768';

  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>
<!-- END IMAGE POSTER -->
