<!-- START STUECKE FILTER -->
<div class="filter">

	<div class="filter-item filter-all">
		Alle
	</div>

	<div class="filter-item filter-get">
		Aktuell
	</div>

	<div class="filter-item filter-get">
		Archiv
	</div>



</div>

<div class="filter">

	<?php
	$terms = get_terms( 'stuecke-category' );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		foreach ( $terms as $term ) {

		$filter_name = $term->name;
		$string = $term->name;

		$string = strtolower($string);
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", "-", $string);
		?>

		<div data-id="<?php echo $string ?>" class="filter-item filter-get">
			<?php echo $filter_name ?>
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
	$active = get_field('archiv');

	if( $active == 1 ):
		$active_mod = "aktuell";
	endif;

	if( $active == "" ):
		$active_mod = "archiv";
	endif;
	?>

		<div class="vorschau-stueck <?php echo $active_mod ?> <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">

			<?php
			include(locate_template('inc/vorschau-stuecke.php'));
			?>

		</div>

	<?php
	endwhile;
	?>
</div>
<!-- END STUECKE FILTER -->
