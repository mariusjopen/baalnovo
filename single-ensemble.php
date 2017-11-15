<?php get_header(); ?>


<p><?php wp_title(''); ?></p>

<div class="main-image">
	<?php
	if( have_rows('bilder') ):
		while( have_rows('bilder') ): the_row();

			$image = get_sub_field('portrait');
			$size = '_768';
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}
			?>

		<?php
		endwhile;
	endif;
	?>
</div>


<div class="content">

	<div class="kurz-text">
		<?php
		if( have_rows('text') ):
			while( have_rows('text') ): the_row();
			?>

				<p><?php echo get_sub_field('kurzbeschreibung'); ?></p>

			<?php
			endwhile;
		endif;
		?>
	</div>

	<div class="galerie">
		<?php
		if( have_rows('bilder') ):
			while( have_rows('bilder') ): the_row();
			?>

			<?php
			$images = get_sub_field('gallerie');
			$size = '_768';
			if( $images ):
			?>
				<ul>
					<?php
					foreach( $images as $image ):
					?>
						<li>
							<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
						</li>
					<?php
					endforeach;
					?>
				</ul>
			<?php
			endif;
			?>

			<?php
			endwhile;
		endif;
		?>
	</div>

	<div class="langer-text">
		<?php
		if( have_rows('text') ):
			while( have_rows('text') ): the_row();
			?>

				<p><?php echo get_sub_field('langer_text'); ?></p>

			<?php
			endwhile;
		endif;
		?>
	</div>

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
