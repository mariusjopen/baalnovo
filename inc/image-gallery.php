<!-- START IMAGE GALLERY -->
<?php if( $images ): ?>

<div class="gallery">
	<div class="flexslider">
		<ul class="slides">
			<?php
			$size = '_768';
			if( $images ):
				foreach( $images as $image ):
				?>

				<li>
					<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				</li>

				<?php
				endforeach;
			endif;
			?>
		</ul>
	</div>
</div>

<?php endif; ?>
<!-- END IMAGE GALLERY -->
