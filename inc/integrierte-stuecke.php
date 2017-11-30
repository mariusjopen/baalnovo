<!-- START INTEGRIERTE STÜCKE -->
<div class="integrierte-stuecke">
	<div class="integrierte-stuecke-poster">

		<div class="element-title titel-2">
			<?php the_field('stucke_im_projekt', 'option'); ?>
		</div>

		<?php
		$post_objects = get_field('integrierte_stucke');
		include(locate_template('inc/insert-stuecke.php'));
		?>

	</div>

	<div class="integrierte-stuecke-events ">
		<?php
		$post_objects = get_field('integrierte_stucke');
		$dates = array();

		if( $post_objects ):
			foreach( $post_objects as $post):
				setup_postdata($post);
				$dates[] = get_the_ID();

			endforeach;
			wp_reset_postdata();
		endif;

		$args = array(
			'post_type'    => 'stuecke',
			'orderby' => 'post__in',
			'post__in' => $dates,
			'meta_query' => array(
				array(
					'key' => 'archiv',
					'compare' => '=',
					'value' => '1'
				)
			 )
		);

		$the_query = new WP_Query( $args );

		if( $the_query->have_posts() ):
			while ( $the_query->have_posts() ) : $the_query->the_post();

				$events = 'events';
				include(locate_template('inc/events-all-raw.php'));

			endwhile;
		endif;
		wp_reset_query();
		?>
	</div>

</div>
<!-- END INTEGRIERTE STÜCKE -->
