<!-- START TECHNISCHE DETAILS -->
<?php
if( have_rows('technische_details') ):
	while( have_rows('technische_details') ): the_row();
	?>

	<div class="technische-details">

		<div class="post-technische-details">

			<div class="label">
				<?php echo get_sub_field('detail_titel'); ?>
			</div>

			<div class="box">

				<?php
				$info= get_sub_field('details_info');

				if( $info ):
					echo $info;
				endif;
				?>



				<?php
				$post_objects = get_sub_field('details_person');
				if( $post_objects ):

					if( $post_objects ):
						foreach( $post_objects as $post):
							setup_postdata($post);
							?>

								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></br>

							<?php
							endforeach;
							wp_reset_postdata();
					endif;

				endif;
				?>


			</div>

		</div>

	</div>

	<?php
	endwhile;
endif;
?>
<!-- END TECHNISCHE DETAILS -->
