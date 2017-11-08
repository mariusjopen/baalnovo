<?php get_header(); ?>

<p>Start</p>

<div class="main-image">
  <?php
  $id = get_id_by_slug('start');

  $image = get_field('vorschau_bild',$id);
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>



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
      while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

          <?php
          if( have_rows('events') ):
            while( have_rows('events') ): the_row();
            ?>
              <div class="post-event" data-date="<?php echo get_sub_field('date', false, false);echo get_sub_field('zeit', false, false); ?>">
                <div class="title"><?php the_title(); ?></div>
                <div class="date"><?php echo get_sub_field('date'); ?></div>
                <div class="time"><?php echo get_sub_field('zeit'); ?></div>
                <div class="location"><?php echo get_sub_field('ort'); ?></div>
                <div class="city"><?php echo get_sub_field('stadt'); ?></div>
                </br>
              </div>

            <?php
            endwhile;
          endif;
          ?>


      <?php
      endwhile;
    endif;
    wp_reset_query();
    ?>

  </div>



  <div class="aktuelles">
    <?php
    query_posts(array(
      'post_type' => 'aktuelles'
    ) );

    while (have_posts()) : the_post();
    ?>

      <div class="post">

        <a href="<?php the_permalink() ?>">
          <?php the_title(); ?>
        </a>

        <?php
        if( have_rows('vorschau') ):
          while( have_rows('vorschau') ): the_row();

            $image = get_sub_field('vorschau_bild');
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

    <?php
    endwhile;
    ?>
  </div>
</div>

<?php get_footer(); ?>
