<!-- START INSERT AKTUELLES -->
<div class="insert-aktuelles">

	<div class="element-title">
		Verknüpfte News Beiträge
	</div>


	<?php
	if( $post_objects ):
		foreach( $post_objects as $post):
			setup_postdata($post); ?>

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
		endforeach;
		wp_reset_postdata();
	endif;
	?>
</div>
<!-- END INSERT AKTUELLES -->
