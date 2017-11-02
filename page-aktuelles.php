<?php /* Template Name: Aktuelles Liste */ ?>

<?php get_header(); ?>

<p>Aktuelles</p>

<p>Vorschaubild</p>

<?php
$image = get_field('vorschau_bild');
$size = '_768';
if( $image ) {
  echo wp_get_attachment_image( $image, $size );
}
?>

<p>Artikel Liste</p>

<?php
query_posts(array(
  'post_type' => 'aktuelles'
) );

while (have_posts()) : the_post();
?>

  <div class="post">

    <p>Artikel</p>

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


<?php get_footer(); ?>
