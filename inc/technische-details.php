<!-- START TECHNISCHE DETAILS -->
<div class="technische-details">
	<?php
	if( have_rows('technische_details') ):
		while( have_rows('technische_details') ): the_row();
		?>

		<div class="post-technische-details">

			<div class="label">
				<?php echo get_sub_field('detail_titel'); ?>
			</div>

			<div class="box">
				<?php echo get_sub_field('details_info'); ?>
			</div>

		</div>

		<?php
		endwhile;
	endif;
	?>
</div>
<!-- END TECHNISCHE DETAILS -->
