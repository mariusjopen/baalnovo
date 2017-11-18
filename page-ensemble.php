<?php /* Template Name: Ensemle Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

	<?php
	$post_type = 'ensemble';
	$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

	foreach( $taxonomies as $taxonomy ) :
	  $terms = get_terms( $taxonomy );
	  foreach( $terms as $term ) :
	  ?>

	    <div class="category-section">

	      <div class="kategorie-name">
	      	<p><?php echo $term->name; ?></p>
	      </div>

				<div class="kategorie-content">
		      <?php
		      $args = array(
		        'post_type' => $post_type,
		        'posts_per_page' => -1,
		  			'orderby' => 'title',
		        'order' => 'ASC',
		        'tax_query' => array(
		          array(
		            'taxonomy' => $taxonomy,
		            'field' => 'slug',
		            'terms' => $term->slug
		          )
		        )
		      );

		      $posts = new WP_Query($args);

		      if( $posts->have_posts() ):
		        while( $posts->have_posts() ) :
	          	$posts->the_post();
		          ?>

		    				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									<?php
									$image = get_field('vorschau_bild');
									include(locate_template('inc/image-main.php'));

									include(locate_template('inc/title-link.php'));
									?>
									
		    				</div>

		      	<?php
		        endwhile;
		      endif;
		      ?>
				</div>

	    </div>

	  <?php
	  endforeach;
	endforeach;
	?>

</div>


<?php get_footer(); ?>
