<!-- START VORSCHAU AKTUELLES -->
<div class="vorschau-aktuelles">

	<div class="element-title">
		<?php the_field('aktuelles', 'option'); ?>
	</div>


	<?php
	query_posts(array(
		'post_type' => 'aktuelles',
		'posts_per_page' => 4,
	) );

	while (have_posts()) : the_post();
	?>

		<div class="vorschau-aktuell">

			<?php
			$image = get_field('vorschau_bild');
			include(locate_template('inc/image-vorschau.php'));

			include(locate_template('inc/title-link.php'));

			 $kurzer_text = get_field('kurzer_text');
			 include(locate_template('inc/text-kurz.php'));
			?>

		</div>

	<?php
	endwhile;
	?>
</div>
<!-- END VORSCHAU AKTUELLES -->
