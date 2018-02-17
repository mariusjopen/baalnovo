<!-- START EVENTS FRONTPAGE -->

<div class="spielplan">

<div class="spielplan-hide">

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

			$events = 'events';
			?>


				<?php
				if( have_rows($events) ):
					while( have_rows($events) ): the_row();


					$date_time = get_sub_field('date', false, false) . get_sub_field('zeit', false, false);
					$date_time_mod = str_replace(':', '', $date_time);

					$date_now = date('Ymd');
					$date = get_sub_field('date', false, false);
					if( $date >= $date_now ):
					?>

						<div class="post-event shuffle" data-date="<?php echo $date_time_mod ?>">
							<a href="<?php the_permalink() ?>?date_time=<?php echo $date_time_mod ?>">
								<div class="title"><?php the_title(); ?></div>
								<div class="date-time">
									<?php echo get_sub_field('date'); ?> | <?php echo get_sub_field('zeit'); ?>
								</div>

								<div class="lokation">
									<?php
									$lokation_array = get_sub_field('lokation');
									?>

									<?php echo get_the_title($lokation_array); ?>,
									<?php echo get_field('stadt', $lokation_array->ID); ?>
								</div>

							</a>
						</div>

					<?php
					endif;

					endwhile;
				endif;
				?>



		<?php
		endwhile;
	endif;
	wp_reset_query();
	?>

	</div>

	<div class="spielplan-inside">
	</div>

</div>
<!-- END EVENTS FRONTPAGE -->
