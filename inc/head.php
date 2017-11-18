<!-- START HEAD -->
<div class="head">
	<?php
	$image = get_field('vorschau_bild');
	include(locate_template('inc/image-main.php'));
	?>

	<div class="navigation">

		<div class="left">
			DE | FR
		</div>

		<div class="middle">
			<?php wp_title(''); ?>
		</div>

		<div class="right">
			Menü
		</div>

	</div>
</div>
<!-- END HEAD -->
