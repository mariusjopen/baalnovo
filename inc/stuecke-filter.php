<!-- START STUECKE FILTER -->
<div class="filter">

	<div class="filter-item filter-all">
		Alle
	</div>

	<?php
	$terms = get_terms( 'stuecke-category' );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		foreach ( $terms as $term ) {
		?>

		<div class="filter-item filter-get">
			<?php echo $term->name ?>
		</div>

		<?php
		}
	}
	?>

</div>

<div class="vorschau-stuecke">
	<?php
	query_posts(array(
		'post_type' => 'stuecke',
		'orderby' => 'title',
		'order'   => 'ASC'
	) );

	while (have_posts()) : the_post();

	$terms = get_the_terms( $post->ID, 'stuecke-category' );
	?>

		<div class="vorschau-stueck <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">

			<?php
			include(locate_template('inc/vorschau-stuecke.php'));
			?>

		</div>

	<?php
	endwhile;
	?>
</div>
<!-- END STUECKE FILTER -->
