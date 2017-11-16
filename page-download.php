<?php /* Template Name: Download Liste */ ?>

<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

  <div class="download-list">

    <div class="content-title">Projekte</div>

    <div class="content-row">
    <?php
    query_posts(array(
      'post_type' => 'projekte',
      'orderby' => 'title',
      'order'   => 'ASC'
    ) );

    while (have_posts()) : the_post();
    ?>

      <div class="post">

        <div class="presse">
      	  <?php
      	  if( have_rows('download_presse') ):

      	    while ( have_rows('download_presse') ) : the_row();

      	      if( get_row_layout() == 'gruppe_bild_download' ):
      	      ?>

      				<div class="download-image">
      					<?php

      					$image = get_sub_field('bild_download');
      					$size = '_768';
      					if( $image ) {
      						echo wp_get_attachment_image( $image, $size );
      					}
      					?>

      				</div>

      	      <?php
      	      elseif( get_row_layout() == 'gruppe_datei_download' ):
      	      ?>

      				<div class="download-datei">
      					<div class="download-datei-bild">
      						<?php

      						$image = get_sub_field('datei_vorschau_download');
      						$size = '_768';
      						if( $image ) {
      							echo wp_get_attachment_image( $image, $size );
      						}
      						?>

      					</div>


      					<div class="download-datei-link">

      						<a href="<?php echo get_sub_field('datei_download') ?>" target="_blank">
      							Download
      						</a>

      					</div>
      				</div>

              <?php
              endif;

      	      endwhile;

      	    else :

      	  endif;
      	  ?>
      	</div>

      </div>

    <?php
    endwhile;
    ?>
  </div>
  </div>

  <div class="download-list">

    <div class="content-title">Stücke</div>

    <div class="content-row">
    <?php
    query_posts(array(
      'post_type' => 'stuecke',
      'orderby' => 'title',
      'order'   => 'ASC'
    ) );

    while (have_posts()) : the_post();
    ?>

      <div class="post">

        <div class="presse">
      	  <?php
      	  if( have_rows('download_presse') ):

      	    while ( have_rows('download_presse') ) : the_row();

      	      if( get_row_layout() == 'gruppe_bild_download' ):
      	      ?>

      				<div class="download-image">
      					<?php

      					$image = get_sub_field('bild_download');
      					$size = '_768';
      					if( $image ) {
      						echo wp_get_attachment_image( $image, $size );
      					}
      					?>

      				</div>

      	      <?php
      	      elseif( get_row_layout() == 'gruppe_datei_download' ):
      	      ?>

      				<div class="download-datei">
      					<div class="download-datei-bild">
      						<?php

      						$image = get_sub_field('datei_vorschau_download');
      						$size = '_768';
      						if( $image ) {
      							echo wp_get_attachment_image( $image, $size );
      						}
      						?>

      					</div>


      					<div class="download-datei-link">

      						<a href="<?php echo get_sub_field('datei_download') ?>" target="_blank">
      							Download
      						</a>

      					</div>
      				</div>

              <?php
              endif;

      	      endwhile;

      	    else :

      	  endif;
      	  ?>
      	</div>

      </div>

    <?php
    endwhile;
    ?>
  </div>
  </div>


  <div class="download-list">

    <div class="content-title">Ensemble</div>

    <div class="content-row">
    <?php
    query_posts(array(
      'post_type' => 'ensemble',
      'orderby' => 'title',
      'order'   => 'ASC'
    ) );

    while (have_posts()) : the_post();
    ?>

      <div class="post">

        <div class="presse">
      	  <?php
      	  if( have_rows('download_presse') ):

      	    while ( have_rows('download_presse') ) : the_row();

      	      if( get_row_layout() == 'gruppe_bild_download' ):
      	      ?>

      				<div class="download-image">
      					<?php

      					$image = get_sub_field('bild_download');
      					$size = '_768';
      					if( $image ) {
      						echo wp_get_attachment_image( $image, $size );
      					}
      					?>

      				</div>

      	      <?php
      	      elseif( get_row_layout() == 'gruppe_datei_download' ):
      	      ?>

      				<div class="download-datei">
      					<div class="download-datei-bild">
      						<?php

      						$image = get_sub_field('datei_vorschau_download');
      						$size = '_768';
      						if( $image ) {
      							echo wp_get_attachment_image( $image, $size );
      						}
      						?>

      					</div>


      					<div class="download-datei-link">

      						<a href="<?php echo get_sub_field('datei_download') ?>" target="_blank">
      							Download
      						</a>

      					</div>
      				</div>

              <?php
              endif;

      	      endwhile;

      	    else :

      	  endif;
      	  ?>
      	</div>

      </div>

    <?php
    endwhile;
    ?>
  </div>
  </div>

</div>


<?php get_footer(); ?>
