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
		if( have_rows('bilder') ):
			while( have_rows('bilder') ): the_row();
			?>

			<?php
			$images = get_sub_field('pressebilder_fur_web_und_print');
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


</div>

<?php get_footer(); ?>
