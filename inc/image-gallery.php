<!-- START IMAGE GALLERY -->
<div class="gallery">
	<?php
	$size = '_768';
	if( $images ):
		foreach( $images as $image ):
		?>

		<div>
			<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
		</div>

		<?php
		endforeach;
	endif;
	?>
</div>
<!-- END IMAGE GALLERY -->
