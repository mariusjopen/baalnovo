<?php /* Template Name: Stücke Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

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
    	<?php include(locate_template('inc/title-link.php')); ?>

			<?php
			$image = get_field('poster');
			include(locate_template('inc/image-poster.php'));
			?>

    </div>

  <?php
  endwhile;
  ?>
</div>


<?php get_footer(); ?>
