<!-- START PRESSE -->
<?php
if( have_rows($presse) ):
?>

	<div class="presse">

		<div class="element-title">
			Presse und Download Bereich
		</div>

		<?php
		while ( have_rows($presse) ) : the_row();
		?>

		<?php
		include(locate_template('inc/title-link.php'));
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
