<!-- START INTEGRIERTE STÜCKE -->
<div class="integrierte-stuecke">
	<div class="integrierte-stuecke-poster">

		<div class="element-title titel-2">
			<?php the_field('stucke_im_projekt', 'option'); ?>
		</div>

		<?php
		$post_objects = get_field('integrierte_stucke');
		include(locate_template('inc/insert-stuecke.php'));
		?>

	</div>

	<div class="integrierte-stuecke-events ">
		<?php
		$post_objects = get_field('integrierte_stucke');
		$dates = array();

		if( $post_objects ):
			foreach( $post_objects as $post):
				setup_postdata($post);
				$dates[] = get_the_ID();

			endforeach;
			wp_reset_postdata();
		endif;

		$args = array(
			'post_type'    => 'stuecke',
			'orderby' => 'post__in',
			'post__in' => $dates,
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

				<div class="events-start">

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

				</div>

				<?php

			endwhile;
		endif;
		wp_reset_query();
		?>
	</div>

</div>
<!-- END INTEGRIERTE STÜCKE -->
