<?php /* Template Name: Spielplan Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php include(locate_template('inc/image-main.php')); ?>

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

            $date_time = get_sub_field('date', false, false) . get_sub_field('zeit', false, false);
            $date_time_mod = str_replace(':', '', $date_time);
            ?>

            <div class="post-event" data-date="<?php echo $date_time_mod ?>">

              <div class="poster">
              <?php
                if( have_rows('bilder') ):
                  while( have_rows('bilder') ): the_row();

                    $image = get_sub_field('poster');
                    $size = '_768';
                    if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                    }
                    ?>

                  <?php
                  endwhile;
                endif;
                ?>
              </div>

              <a href="<?php the_permalink() ?>?date_time=<?php echo $date_time_mod ?>">
                <div class="title"><?php the_title(); ?></div>
              </a>

              <div class="row">
                <div class="date"><?php echo get_sub_field('date'); ?></div>
                <div class="time"><?php echo get_sub_field('zeit'); ?></div>
                <div class="location"><?php echo get_sub_field('ort'); ?></div>
                <div class="city"><?php echo get_sub_field('stadt'); ?></div>
                </br>
              </div>

              <div class="kurz">
                <div class="tickets"><a href="<?php echo get_sub_field('ticket'); ?>" target="_blank" >Ticket</a></div>

                <div class="kurztext">
              		<?php
              			if( have_rows('texte') ):
              				while( have_rows('texte') ): the_row();
              				?>
              				<p><?php the_sub_field('kurztext'); ?></p>
              				<?php
              				endwhile;
              			endif;
              			?>
              	</div>
              </div>

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

</div>


<?php get_footer(); ?>
