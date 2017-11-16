<?php get_header(); ?>

<?php
$string = $_SERVER['QUERY_STRING'] ;
$numSymbols = 24;
$res_string = substr($string, 0, $numSymbols);
$trimmed = ltrim($res_string, "date_time=");
$date_url = $trimmed;
?>

<p><?php wp_title(''); ?></p>

<?php include(locate_template('inc/image-main.php')); ?>

<div class="content">

	<div class="untertitel">
		<p><?php the_field('untertitel'); ?></p>
	</div>

	<?php
	$kurzer_text = get_field('kurzer_text');
	include(locate_template('inc/text-kurz.php'));
	?>

	<div class="this-event">

		<?php
		if( have_rows('events') ):
			while( have_rows('events') ): the_row();

			$date_time = get_sub_field('date', false, false) . get_sub_field('zeit', false, false);
			$date_time_mod = str_replace(':', '', $date_time);

			if ($date_url == $date_time_mod) {
			?>

				<div class="ticket"><a href="<?php echo get_sub_field('ticket'); ?>" target="_blank" >Ticket</a></div>

				<div class="post-event" data-date="<?php echo $date_time_mod ?>">
					<a href="<?php the_permalink() ?>?date_time=<?php echo $date_time_mod ?>">
						<div class="title"><?php the_title(); ?></div>
						<div class="date"><?php echo get_sub_field('date'); ?></div>
						<div class="time"><?php echo get_sub_field('zeit'); ?></div>
						<div class="location"><?php echo get_sub_field('ort'); ?></div>
						<div class="city"><?php echo get_sub_field('stadt'); ?></div>
					</br>
					</a>
				</div>

			<?php
			};
			?>

			<?php
			endwhile;
		endif;
		?>
	</div>

	<?php include(locate_template('inc/image-poster.php')); ?>

	<div class="mitwirkende">

		<div class="regie">
			<?php
			if( have_rows('mitwirkende') ):
				while( have_rows('mitwirkende') ): the_row();

				$post_objects = get_sub_field('regie');
				if( $post_objects ):
					foreach( $post_objects as $post):
						setup_postdata($post);
						?>
			        <div class="post-regie">
			            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			        </div>
				    <?php
						endforeach;
						wp_reset_postdata();
				endif;

				endwhile;
			endif;
			?>
		</div>

		<div class="regie">
			<?php
			if( have_rows('mitwirkende') ):
				while( have_rows('mitwirkende') ): the_row();

				$post_objects = get_sub_field('mit');
				if( $post_objects ):
					foreach( $post_objects as $post):
						setup_postdata($post);
						?>
			        <div class="post-mit">
			            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			        </div>
				    <?php
						endforeach;
						wp_reset_postdata();
				endif;

				endwhile;
			endif;
			?>
		</div>

	</div>

	<div class="technische-details">
		<?php
		if( have_rows('technische_details') ):
			while( have_rows('technische_details') ): the_row();
			?>

			<div class="post-technische-details">

				<div class="detail-title">
					<?php echo get_sub_field('detail_titel'); ?>
				</div>

				<div class="detail-title">
					<?php echo get_sub_field('details_info'); ?>
				</div>

			</div>

			<?php
			endwhile;
		endif;
		?>
	</div>

	<div class="langtext">
		<?php
			if( have_rows('texte') ):
				while( have_rows('texte') ): the_row();
				?>
				<p><?php the_sub_field('langer_text'); ?></p>
				<?php
				endwhile;
			endif;
			?>
	</div>

	<div class="zitate">
		<?php
		if( have_rows('zitate') ):
			while( have_rows('zitate') ): the_row();
			?>

			<div class="post-zitate">

				<div class="detail-zital">
					<?php echo get_sub_field('zitat'); ?>
				</div>

				<div class="detail-quelle">
					<?php echo get_sub_field('quelle'); ?>
				</div>

			</div>

			<?php
			endwhile;
		endif;
		?>
	</div>

	<div class="gallerie">
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

	<div class="all-events">
		<?php
		if( have_rows('events') ):
			while( have_rows('events') ): the_row();

			$date_time = get_sub_field('date', false, false) . get_sub_field('zeit', false, false);
			$date_time_mod = str_replace(':', '', $date_time);
			?>

			<div class="post-event" data-date="<?php echo $date_time_mod ?>">
				<a href="<?php the_permalink() ?>?date_time=<?php echo $date_time_mod ?>">
					<div class="title"><?php the_title(); ?></div>
					<div class="date"><?php echo get_sub_field('date'); ?></div>
					<div class="time"><?php echo get_sub_field('zeit'); ?></div>
					<div class="location"><?php echo get_sub_field('ort'); ?></div>
					<div class="city"><?php echo get_sub_field('stadt'); ?></div>
				</br>
				</a>
			</div>

			<?php
			endwhile;
		endif;
		?>
	</div>

	<div class="sponsoren">
		<?php
		$images = get_field('sponsoren');
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
