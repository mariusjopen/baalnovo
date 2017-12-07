<!-- START EVENTS THIS -->
<?php
if( have_rows($event) ):

	if ($date_url != "") :
	?>

		<div class="events-this">



			<?php
			while( have_rows($event) ): the_row();

			$date_time = get_sub_field('date', false, false) . get_sub_field('zeit', false, false);
			$date_time_mod = str_replace(':', '', $date_time);

			if ($date_url == $date_time_mod) {
			?>


				<div class="post-event" data-date="<?php echo $date_time_mod ?>">
					<!-- <a href="<?php the_permalink() ?>?date_time=<?php echo $date_time_mod ?>"> -->
						<div class="title"><?php the_title(); ?></div>
						<div class="date-time">
							<?php echo get_sub_field('date'); ?> | <?php echo get_sub_field('zeit'); ?>
						</div>

						<div class="lokation">
							<?php
							$post_object = get_sub_field('lokation');
							if( $post_object ) :

								$post = $post_object;
								setup_postdata($post);
								?>

									<?php the_title(); ?>,
									<?php echo get_field('stadt'); ?>

								<?php
								  wp_reset_postdata( $post );
							endif;
							?>
						</div>
					<!-- </a> -->
				</div>

				<div class="adresse">
					<?php
					$post_object = get_sub_field('lokation');
					if( $post_object ) :

						$post = $post_object;
						setup_postdata($post);
						?>

								<?php the_title(); ?>,
								<?php echo get_field('strasse'); ?> <?php echo get_field('hausnummer'); ?>,
								<?php echo get_field('stadt'); ?>,
								<?php echo get_field('land'); ?>

						<?php
							wp_reset_postdata( $post );
					endif;
					?>
				</div>



					<?php
					$ticket = get_sub_field('ausverkauft');

					if( $ticket == "" ):
					?>

						<?php
						$ticket_link = get_sub_field('ticket_link');
						if( $ticket_link ):
						?>

							<div class="ticket">
								<a href="<?php echo $ticket_link ?>" target="_blank" ><?php the_field('ticket_kaufen', 'option'); ?></a>
							</div>

						<?php
						endif;
						?>

						<?php
						$ticket_email = get_sub_field('ticket_email');
						if( $ticket_email ):
						?>

						<div class="ticket">
							<a href="mailto:<?php echo $ticket_email  ?>" ><?php the_field('ticket_kaufen', 'option'); ?></a>
						</div>

						<?php
						endif;
						?>

					<?php
					endif;

					if( $ticket == 1 ):
					?>

					<div class="ticket">
						<?php the_field('ticket_ausverkauft', 'option'); ?>
					</div>

					<?php
					endif;
					?>



					<?php
					$extra = get_sub_field('extra_informationen');
					if( $extra ):
					?>

						<div class="extra">

							<?php echo $extra; ?>

						</div>

					<?php
					endif;

			};

			endwhile;
			?>
		</div>

	<?php
	endif;

endif;
?>
<!-- END EVENTS THIS -->
