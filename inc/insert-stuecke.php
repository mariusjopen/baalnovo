<!-- START INSERT STUECKE -->
<div class="insert-stuecke">

	<div class="element-title">
		<?php the_field('verknuepft_stuecke', 'option'); ?>
	</div>




	<?php
	if( $post_objects ):
		foreach( $post_objects as $post):
			setup_postdata($post); ?>

			<div class="vorschau-artikel">

				<?php
				$image = get_field('poster');
				?>

				<a href="<?php the_permalink() ?>">
					<?php include(locate_template('inc/image-poster.php')); ?>
				</a>

				<?php
				include(locate_template('inc/title-link.php'));

				// $kurzer_text = get_field('kurzer_text');
				// include(locate_template('inc/text-kurz.php'));
				?>

			</div>

		<?php
		endforeach;
		wp_reset_postdata();
	endif;
	?>
</div>
<!-- END INSERT STUECKE -->
