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

        if( get_row_layout() == 'text' ):

        	echo get_sub_field('text');

        elseif( get_row_layout() == 'bild' ):

        	echo get_sub_field('bild');

        elseif( get_row_layout() == 'galerie' ):

        	echo get_sub_field('galerie');

        elseif( get_row_layout() == 'youtube' ):

        	echo get_sub_field('youtube');

        endif;

    endwhile;

else :

endif;
?>

<?php get_footer(); ?>
