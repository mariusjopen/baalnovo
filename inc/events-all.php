<!-- START EVENTS ALL -->
<div class="events-all">

	<div class="element-title">
		<?php the_field('alle_events', 'option'); ?>
	</div>

	<div class="spielplan">

	<?php
	include(locate_template('inc/events-all-raw.php'));
	?>

		</div>

</div>
<!-- END EVENTS ALL -->
