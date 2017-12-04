<!-- START FLEX -->
<?php
if( have_rows($flex) ):
?>

<div class="flex">

		<?php
		while ( have_rows($flex) ) : the_row();
			if( get_row_layout() == 'group_text' ):

				$text_text = get_sub_field('text');
				include(locate_template('inc/text-lang.php'));

			elseif( get_row_layout() == 'group_bild' ):

				$image = get_sub_field('bild');
				include(locate_template('inc/image-normal.php'));

			elseif( get_row_layout() == 'group_uberschrift' ):

				$uberschrift = get_sub_field('uberschrift');
				include(locate_template('inc/uberschrift.php'));

			elseif( get_row_layout() == 'group_galerie' ):

				$images = get_sub_field('galerie');
				include(locate_template('inc/image-gallery.php'));

			elseif( get_row_layout() == 'group_media' ):

				$iframe = get_sub_field('media');
				include(locate_template('inc/oembed.php'));

			elseif( get_row_layout() == 'group_stuck' ):

				$post_objects = get_sub_field('stucke_einfugen');
				include(locate_template('inc/insert-stuecke.php'));

			elseif( get_row_layout() == 'group_aktuelles' ):

				$post_objects = get_sub_field('aktuelles_einfugen');
				include(locate_template('inc/insert-aktuelles.php'));

			endif;
		endwhile;
		?>

	</div>

<?php
else :
endif;
?>
<!-- END FLEX -->
