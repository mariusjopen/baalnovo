<!-- START ZITATE -->
	<?php
	if( have_rows('zitate') ):
		while( have_rows('zitate') ): the_row();
		?>

		<div class="zitate">
			<div class="post-zitate">

				<div class="zitate-detail">
					<?php echo get_sub_field('zitat'); ?>
				</div>

				<div class="zitate-quelle">
					<?php echo get_sub_field('quelle'); ?>
				</div>

			</div>
		</div>

		<?php
		endwhile;
	endif;
	?>
<!-- END ZITATE -->
