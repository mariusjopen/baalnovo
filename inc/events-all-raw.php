<!-- START EVENTS ALL RAW -->

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
				<div class="location-city">
					<div class="location"><?php echo get_sub_field('ort'); ?>, <?php echo get_sub_field('stadt'); ?></div>
				</div>
			</a>
		</div>

	<?php
	endif;

	endwhile;
endif;
?>

<!-- END EVENTS ALL RAW -->
