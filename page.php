<?php get_header(); ?>

<p>SEITE</p>

<?php
$image = get_field('vorschau_bild');
$size = '_768';
if( $image ) {
  echo wp_get_attachment_image( $image, $size );
}
?>

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
        elseif( get_row_layout() == 'group_youtube' ):
        ?>

        	<p><?php echo get_sub_field('youtube'); ?></p>

        <?php
        endif;

    endwhile;

else :

endif;
?>

<?php get_footer(); ?>
