<?php get_header(); ?>

<p>SEITE</p>

<p>Vorschaubild</p>

<?php
$image = get_field('vorschau_bild');
$size = '_768';
if( $image ) {
  echo wp_get_attachment_image( $image, $size );
}
?>

<p>Gruppe</p>

<?php
if( have_rows('inhalt') ):

  while ( have_rows('inhalt') ) : the_row();

    if( get_row_layout() == 'group_text' ):
    ?>

    	<p><?php echo get_sub_field('text'); ?></p>

    <?php
    elseif( get_row_layout() == 'group_bild' ):
    ?>

      <?php
      $image = get_sub_field('bild');
      $size = '_768';
      if( $image ) {
        echo wp_get_attachment_image( $image, $size );
      }
      ?>

    <?php
    elseif( get_row_layout() == 'group_galerie' ):
    ?>

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

    <?php
    elseif( get_row_layout() == 'group_media' ):
    ?>

      <div class="embed-container">
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

        <?php
        echo get_sub_field('stucke_einfugen');
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

      <?php
      elseif( get_row_layout() == 'group_aktuelles' ):
      ?>

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

      <?php
      endif;

    endwhile;

  else :

endif;
?>





<?php get_footer(); ?>
