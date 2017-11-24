<!-- START IMAGE POSTER -->
<div class="image-poster">
	<div class="inside">
  <?php
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
	</div>
</div>
<!-- END IMAGE POSTER -->
