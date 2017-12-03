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
						<div class="location-city">
							<div class="location"><?php echo get_sub_field('ort'); ?>, <?php echo get_sub_field('stadt'); ?></div>
						</div>
					<!-- </a> -->
				</div>

				<div class="ticket">

					<?php
					$ticket = get_sub_field('ausverkauft');

					if( $ticket == "" ):
					?>
						<a href="<?php echo get_sub_field('ticket'); ?>" target="_blank" ><?php the_field('ticket_kaufen', 'option'); ?></a>
					<?php
					endif;

					if( $ticket == 1 ):
						the_field('ticket_ausverkauft', 'option');
					endif;
					?>

				</div>

				<div class="extra">

					<?php
					the_sub_field('extra_informationen');
					?>

				</div>


			<?php
			};



			?>

			<?php
			endwhile;
			?>
		</div>

	<?php
	endif;

endif;
?>
<!-- END EVENTS THIS -->
