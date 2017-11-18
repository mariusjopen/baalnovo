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


	<div class="vorschau-aktuelles">
		<?php
		query_posts(array(
			'post_type' => 'aktuelles'
		) );

		while (have_posts()) : the_post();
		?>

			<div class="vorschau-aktuell">

				<?php
				include(locate_template('inc/title-link.php'));

				$image = get_field('vorschau_bild');
				include(locate_template('inc/image-main.php'));

				$kurzer_text = get_field('kurzer_text');
				include(locate_template('inc/text-kurz.php'));
				?>

			</div>

		<?php
		endwhile;
		?>
	</div>

</div>

<?php get_footer(); ?>
