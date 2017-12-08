<!-- START EVENTS SPIELPLAN -->
<div class="events-spielplan spielplan">

	<?php
	$args = array(
		'post_type'    => 'stuecke',
		'meta_query' => array(
			array(
				'key' => 'archiv',
				'compare' => '=',
				'value' => '1'
			)
		 )
	);

	$the_query = new WP_Query( $args );

	if( $the_query->have_posts() ):
		while ( $the_query->have_posts() ) : $the_query->the_post();

			if( have_rows('events') ):
				while( have_rows('events') ): the_row();

				$date_time = get_sub_field('date', false, false) . get_sub_field('zeit', false, false);
				$date_time_mod = str_replace(':', '', $date_time);

				$date_now = date('Ymd');
				$date = get_sub_field('date', false, false);
				if( $date >= $date_now ):
				?>

					<div class="post-event shuffle" data-date="<?php echo $date_time_mod ?>">

						<a href="<?php the_permalink() ?>?date_time=<?php echo $date_time_mod ?>">
							<?php
							$image = get_field('poster');
							include(locate_template('inc/image-poster.php'));
							?>
						</a>

						<div class="event-content">
							<a href="<?php the_permalink() ?>?date_time=<?php echo $date_time_mod ?>">
								<div class="title"><?php the_title(); ?></div>
							</a>

							<div class="row">
								<div class="date"><?php echo get_sub_field('date'); ?></div>
								<div class="row-flex">
									<div class="time"><?php echo get_sub_field('zeit'); ?></div>

									<div class="lokation">
										<?php
										$lokation_array = get_sub_field('lokation');
										?>

										<?php echo get_the_title($lokation_array); ?>,
										<?php echo get_field('stadt', $lokation_array->ID); ?>
									</div>

								</div>
							</div>

							<div class="kurz">
								<?php
								$ticket = get_sub_field('ausverkauft');

								if( $ticket == "" ):
								?>

									<?php
									$ticket_link = get_sub_field('ticket_link');
									if( $ticket_link ):
									?>

										<div class="tickets">
											<a href="<?php echo $ticket_link ?>" target="_blank" ><?php the_field('ticket_kaufen', 'option'); ?></a>
										</div>

									<?php
									endif;
									?>

									<?php
									$ticket_email = get_sub_field('ticket_email');
									if( $ticket_email ):
									?>

									<div class="tickets">
										<a href="mailto:<?php echo $ticket_email  ?>" ><?php the_field('ticket_kaufen', 'option'); ?></a>
									</div>

									<?php
									endif;
									?>

								<?php
								endif;

								if( $ticket == 1 ):
								?>

								<div class="tickets">
									<?php the_field('ticket_ausverkauft', 'option'); ?>
								</div>

								<?php
								endif;
								?>

								<?php
								$kurzer_text = get_field('kurzer_text');
								include(locate_template('inc/text-kurz.php'));
								?>

							</div>
						</div>

					</div>

				<?php
				endif;

				endwhile;
			endif;

		endwhile;
	endif;
	wp_reset_query();
	?>

</div>
<!-- END EVENTS SPIELPLAN -->
