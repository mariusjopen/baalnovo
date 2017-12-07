<!-- START EVENTS ALL -->
<?php
if( have_rows($events) ):
?>

<div class="events-all">

	<div class="element-title">
		<?php the_field('alle_events', 'option'); ?>
	</div>

	<div class="spielplan">

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

					</a>
				</div>

			<?php
			endif;

			endwhile;
		endif;
		?>

	</div>

</div>

<?php
endif;
?>
<!-- END EVENTS ALL -->
