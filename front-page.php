<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));
?>

<div class="content">

  <div class="spielplan">

    <?php
    $args = array(
      'post_type'    => 'stuecke',
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
				include(locate_template('inc/events-all.php'));

      endwhile;
    endif;
    wp_reset_query();
    ?>

  </div>

	<?php
	include(locate_template('inc/vorschau-aktuelles.php'));
	?>


</div>

<?php get_footer(); ?>
