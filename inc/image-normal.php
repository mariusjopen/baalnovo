<!-- START IMAGE NORMAL -->
<?php if( $image ): ?>

	<div class="image-normal">
		<div class="inside">
		  <?php
		  $size = '_768';
		  echo wp_get_attachment_image( $image, $size );
		  ?>
		</div>
	</div>

<?php endif; ?>
<!-- END IMAGE NORMAL -->
