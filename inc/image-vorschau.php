<!-- START IMAGE VORSCHAU -->
<div class="image-vorschau">
	<a href="<?php the_permalink() ?>">
  <?php
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
	</a>
</div>
<!-- END IMAGE VORSCHAU -->
