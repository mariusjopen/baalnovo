<?php /* Template Name: Ensemle Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php include(locate_template('inc/image-main.php')); ?>

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

                    <div class="vorschau">
                      <?php
                      if( have_rows('bilder') ):
                        while( have_rows('bilder') ): the_row();

                          $image = get_sub_field('portrait');
                          $size = '_768';
                          if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                          }
                          ?>

                          <p><?php echo get_sub_field('kurzer_text'); ?></p>

                        <?php
                        endwhile;
                      endif;
                      ?>
                    </div>

                    <a href="<?php the_permalink() ?>">
                      <?php the_title(); ?>
                    </a>

          				</div>

            	<?php
              endwhile;
            endif;
            ?>

          </div>

      <?php
      endforeach;
    endforeach;
    ?>



</div>


<?php get_footer(); ?>
