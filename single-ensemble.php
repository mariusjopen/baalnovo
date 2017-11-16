<?php get_header(); ?>


<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

	<?php
	$kurzer_text = get_field('kurzer_text');
	include(locate_template('inc/text-kurz.php'));
	?>

	<?php
	$images = get_field('gallerie');
	include(locate_template('inc/image-gallery.php'));
	?>

	<?php
	$text_text = get_field('langer_text');
	include(locate_template('inc/text-lang.php'));
	?>

	<div class="presse">
	  <?php
	  if( have_rows('download_presse') ):

	    while ( have_rows('download_presse') ) : the_row();

	      if( get_row_layout() == 'gruppe_bild_download' ):
	      ?>

				<div class="download-image">
					<?php

					$image = get_sub_field('bild_download');
					$size = '_768';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>

				</div>

	      <?php
	      elseif( get_row_layout() == 'gruppe_datei_download' ):
	      ?>

				<div class="download-datei">
					<div class="download-datei-bild">
						<?php

						$image = get_sub_field('datei_vorschau_download');
						$size = '_768';
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>

					</div>


					<div class="download-datei-link">

						<a href="<?php echo get_sub_field('datei_download') ?>" target="_blank">
							Download
						</a>

					</div>
				</div>

        <?php
        endif;

	      endwhile;

	    else :

	  endif;
	  ?>
	</div>


</div>

<?php get_footer(); ?>
