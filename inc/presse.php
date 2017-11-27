<!-- START PRESSE -->
<?php
if( have_rows($presse) ):
?>

	<div class="presse">

		<?php
		while ( have_rows($presse) ) : the_row();
		?>

			<div class="download-datei">

				<div class="post">
					<?php
					$image = get_sub_field('bild');
					$size = '_768';

					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>
				</div>

				<div class="presse-datei">
					<a href="<?php echo get_sub_field('datei') ?>" target="_blank">
						Download
					</a>
				</div>

			</div>

		<?php
		endwhile;
		?>

	</div>

<?php
else :
endif;
?>

<!-- END PRESSE -->
