<!-- START IMAGE POSTER -->
<?php if( $image ): ?>

	<div class="image-poster">
		<div class="inside">
	  <?php
	  $size = '_768';
	  echo wp_get_attachment_image( $image, $size );
	  ?>
		</div>
	</div>

<?php endif; ?>
<!-- END IMAGE POSTER -->
