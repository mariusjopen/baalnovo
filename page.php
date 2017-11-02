<?php get_header(); ?>

<p>SEITE</p>

<div class="main-image">
  <?php
  $image = get_field('vorschau_bild');
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>

<div class="group-container">
  <?php
  if( have_rows('inhalt') ):

    while ( have_rows('inhalt') ) : the_row();

      if( get_row_layout() == 'group_text' ):
      ?>

        <div class="group-text">
      	   <p><?php echo get_sub_field('text'); ?></p>
        </div>

      <?php
      elseif( get_row_layout() == 'group_bild' ):
      ?>

        <div class="group-bild">
          <?php
          $image = get_sub_field('bild');
          $size = '_768';
          if( $image ) {
            echo wp_get_attachment_image( $image, $size );
          }
          ?>
        </div>

      <?php
      elseif( get_row_layout() == 'group_galerie' ):
      ?>

        <div class="group-galerie">
          <?php
          $images = get_sub_field('galerie');
          $size = '_768';
          if( $images ):
          ?>
            <ul>
              <?php
              foreach( $images as $image ):
              ?>
                <li>
                  <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                </li>
              <?php
              endforeach;
              ?>
            </ul>
          <?php
          endif;
          ?>
        </div>

      <?php
      elseif( get_row_layout() == 'group_media' ):
      ?>

        <div class="group-embed">
          <?php
          $iframe = get_sub_field('media');

          preg_match('/src="(.+?)"/', $iframe, $matches);
          $src = $matches[1];

          $params = array(
            'controls'    => 0,
            'hd'        => 1,
            'autohide'    => 1
          );

          $new_src = add_query_arg($params, $src);
          $iframe = str_replace($src, $new_src, $iframe);
          $attributes = 'frameborder="0"';
          $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

          echo $iframe;
          ?>
        </div>

        <?php
        elseif( get_row_layout() == 'group_stuck' ):
        ?>

          <div class="group-stuck">
            <?php
            $post_objects = get_sub_field('stucke_einfugen');
            if( $post_objects ):
            ?>

              <ul>
                <?php foreach( $post_objects as $post): ?>
                  <?php setup_postdata($post); ?>
                  <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>

              <?php wp_reset_postdata(); ?>

            <?php
            endif;
            ?>
          </div>

        <?php
        elseif( get_row_layout() == 'group_aktuelles' ):
        ?>

          <div class="group-aktuelles">
            <?php
            $post_objects = get_sub_field('aktuelles_einfugen');
            if( $post_objects ):
            ?>

              <ul>
                <?php foreach( $post_objects as $post): ?>
                  <?php setup_postdata($post); ?>
                  <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                    <?php
                    $image = the_sub_field('vorschau_bild', $post_object->ID);
                    $size = '_768';
                    if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                    }
                    ?>
                  </li>
                <?php endforeach; ?>
              </ul>

              <?php wp_reset_postdata(); ?>

            <?php
            endif;
            ?>
          </div>

        <?php
        endif;

      endwhile;

    else :

  endif;
  ?>
</div>




<?php get_footer(); ?>
