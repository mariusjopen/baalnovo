<!-- START INSERT AKTUELLES -->
<div class="insert-aktuelles">
	<?php
	if( $post_objects ):
		foreach( $post_objects as $post):
			setup_postdata($post); ?>

			<div class="vorschau-aktuelles">

				<?php
				include(locate_template('inc/vorschau-aktuelles.php'));
				?>

			</div>

		<?php
		endforeach;
		wp_reset_postdata();
	endif;
	?>
</div>
<!-- END INSERT AKTUELLES -->
