<!-- START IMAGE MAIN -->
<?php if( $image ): ?>

	<div class="image-main">
	  <?php
	  $size = '_2560';
	  if( $image ) {
	    echo wp_get_attachment_image( $image, $size );
	  }
	  ?>
	</div>

<?php endif; ?>
<!-- END IMAGE MAIN -->
