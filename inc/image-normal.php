<!-- START IMAGE NORMAL -->
<?php if( $image ): ?>

	<div class="image-normal">
		<div class="inside">
		  <?php
		  $size = '_768';
		  echo wp_get_attachment_image( $image, $size );
			?>
		</div>

		<?php
		$image_array =  wp_get_attachment($image  );
		$image_array_caption = $image_array["caption"];

		if( $image_array_caption ):
		?>

			<div class="caption">
				<?php echo $image_array_caption; ?>
			</div>

		<?php endif; ?>

	</div>

<?php endif; ?>
<!-- END IMAGE NORMAL -->
