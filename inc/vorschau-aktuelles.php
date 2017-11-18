<!-- START VORSCHAU AKTUELLES -->
<div class="vorschau-aktuelles">
	<?php
	query_posts(array(
		'post_type' => 'aktuelles'
	) );

	while (have_posts()) : the_post();
	?>

		<div class="vorschau-aktuell">

			<?php
			include(locate_template('inc/title-link.php'));

			$image = get_field('vorschau_bild');
			include(locate_template('inc/image-main.php'));

			$kurzer_text = get_field('kurzer_text');
			include(locate_template('inc/text-kurz.php'));
			?>

		</div>

	<?php
	endwhile;
	?>
</div>
<!-- END VORSCHAU AKTUELLES -->
