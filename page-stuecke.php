<?php /* Template Name: Stücke Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<div class="main-image">
  <?php
  $image = get_field('vorschau_bild');
  $size = '_768';
  if( $image ) {
    echo wp_get_attachment_image( $image, $size );
  }
  ?>
</div>

<div class="content">

  <div class="filter">
    <div class="filter-item filter-all">Alle</div>

    <?php
    $terms = get_terms( 'stuecke-category' );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
      foreach ( $terms as $term ) {
      ?>
      <div class="filter-item filter-get"><?php echo $term->name ?></div>

      <?php
      }
    }
    ?>
  </div>


  <?php
  query_posts(array(
    'post_type' => 'stuecke',
    'orderby' => 'title',
    'order'   => 'ASC'
  ) );

  while (have_posts()) : the_post();

  $terms = get_the_terms( $post->ID, 'stuecke-category' );
  ?>

    <div class="post-stuecke <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">

      <a href="<?php the_permalink() ?>">
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
      </a>

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

    </div>

  <?php
  endwhile;
  ?>
</div>


<?php get_footer(); ?>
