<!-- START IMAGE GALLERY -->
<?php if( $images ): ?>

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

<?php endif; ?>
<!-- END IMAGE GALLERY -->
