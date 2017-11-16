<?php get_header(); ?>


<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">


	<?php
	$kurzer_text = get_field('kurzer_text');
	include(locate_template('inc/text-kurz.php'));
	?>


	<div class="integrierte-stuecke">
		<div class="integrierte-stuecke-poster">

			<?php
			$post_objects = get_field('integrierte_stucke');
			include(locate_template('inc/insert-stuecke.php'));
			?>
			
		</div>

		<div class="integrierte-stuecke-events spielplan">
			<?php

			$post_objects = get_field('integrierte_stucke');

			$dates = array();

			if( $post_objects ):
				foreach( $post_objects as $post):
					setup_postdata($post);
					$dates[] = get_the_ID();

				endforeach;
				wp_reset_postdata();
			endif;

	    $args = array(
	      'post_type'    => 'stuecke',
				'orderby' => 'post__in',
				'post__in' => $dates,
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
	              <a href="<?php the_permalink() ?>?date_time=<?php echo $date_time_mod ?>">
	                <div class="title"><?php the_title(); ?></div>
	                <div class="date"><?php echo get_sub_field('date'); ?></div>
	                <div class="time"><?php echo get_sub_field('zeit'); ?></div>
	                <div class="location"><?php echo get_sub_field('ort'); ?></div>
	                <div class="city"><?php echo get_sub_field('stadt'); ?></div>
	              </br>
	              </a>
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

	<?php
	$flex = 'inhalt';
	include(locate_template('inc/flex.php'));
	?>

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

<?php get_footer(); ?>
