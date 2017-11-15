<?php get_header(); ?>


<p><?php wp_title(''); ?></p>

<?php include(locate_template('inc/image-main.php')); ?>


<div class="content">

	<div class="kurz-text">
		 <p><?php echo get_field('kurzer_text'); ?></p>
	</div>


	<div class="integrierte-stuecke">
		<div class="integrierte-stuecke-poster">
			<?php
			$post_objects = get_field('integrierte_stucke');
			if( $post_objects ):
				foreach( $post_objects as $post):
					setup_postdata($post); ?>
					<div class="vorschau-artikel">

						<div class="vorschau-titel">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>

						<div class="vorschau-bild">
							<?php
							if( have_rows('bilder') ):
								 while( have_rows('bilder') ): the_row();

									 $image = get_sub_field('poster');
									 $size = '_768';
									 if( $image ) {
										 echo wp_get_attachment_image( $image, $size );
									 }

								endwhile;
							endif;
							?>
						</div>

						<div class="vorschau-text">
							<?php
							if( have_rows('texte') ):
								 while( have_rows('texte') ): the_row();
								 ?>

									<p><?php echo get_sub_field('kurztext'); ?></p>

								 <?php
								 endwhile;
							endif;
							?>
						</div>

					</div>

				<?php
				endforeach;
				wp_reset_postdata();
			endif;
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

	<div class="flex">
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
	              foreach( $post_objects as $post):
	                setup_postdata($post); ?>

	                <div class="vorschau-artikel">

	                  <div class="vorschau-titel">
	                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                  </div>

	                  <div class="vorschau-bild">
	                    <?php
	                    if( have_rows('bilder') ):
	                  	   while( have_rows('bilder') ): the_row();

	                         $image = get_sub_field('vorschau_bild');
	                         $size = '_768';
	                         if( $image ) {
	                           echo wp_get_attachment_image( $image, $size );
	                         }

	                      endwhile;
	                    endif;
	                    ?>
	                  </div>

	                  <div class="vorschau-text">
	                    <?php
	                    if( have_rows('texte') ):
	                  	   while( have_rows('texte') ): the_row();
	                       ?>

	                        <p><?php echo get_sub_field('kurztext'); ?></p>

	                       <?php
	                       endwhile;
	                    endif;
	                    ?>
	                  </div>

	                </div>

	              <?php
	              endforeach;
	              wp_reset_postdata();
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
	              foreach( $post_objects as $post):
	                setup_postdata($post); ?>

	                <div class="vorschau-artikel">

	                  <div class="vorschau-titel">
	                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                  </div>

	                  <div class="vorschau-bild">
	                    <?php
	                    if( have_rows('vorschau') ):
	                       while( have_rows('vorschau') ): the_row();

	                         $image = get_sub_field('vorschau_bild');
	                         $size = '_768';
	                         if( $image ) {
	                           echo wp_get_attachment_image( $image, $size );
	                         }

	                      endwhile;
	                    endif;
	                    ?>
	                  </div>

	                  <div class="vorschau-text">
	                    <?php
	                    if( have_rows('vorschau') ):
	                       while( have_rows('vorschau') ): the_row();
	                       ?>

	                        <p><?php echo get_sub_field('kurzer_text'); ?></p>

	                       <?php
	                       endwhile;
	                    endif;
	                    ?>
	                  </div>

	                </div>

	              <?php
	              endforeach;
	              wp_reset_postdata();
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
