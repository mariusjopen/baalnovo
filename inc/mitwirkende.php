<!-- START MITWIRKENDE -->
	<?php
	if( have_rows('mitwirkende') ):
		while( have_rows('mitwirkende') ): the_row();
		$post_objects = get_sub_field('regie');

		if( $post_objects ):
		?>

			<div class="regie">

				<div class="label">
					Regie
				</div>

				<div class="box">

				<?php
				if( $post_objects ):
					foreach( $post_objects as $post):
						setup_postdata($post);
						?>
							<div class="post-regie">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
						<?php
						endforeach;
						wp_reset_postdata();
				endif;
				?>

				</div>

			</div>

		<?php
		endif;
		endwhile;
	endif;
	?>

	<?php
	if( have_rows('mitwirkende') ):
		while( have_rows('mitwirkende') ): the_row();
		$post_objects = get_sub_field('mit');

		if( $post_objects ):
		?>

			<div class="mit">

				<div class="label">
					Mit
				</div>

				<div class="box">

				<?php
				if( $post_objects ):
					foreach( $post_objects as $post):
						setup_postdata($post);
						?>
							<div class="post-mit">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
						<?php
						endforeach;
						wp_reset_postdata();
				endif;
				?>

				</div>

			</div>

		<?php
		endif;
		endwhile;
	endif;
	?>

<!-- END MITWIRKENDE -->
