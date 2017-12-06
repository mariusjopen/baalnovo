<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));

$id = get_id_by_slug('projekte-liste');

$image = get_field('vorschau_bild', $id);
include(locate_template('inc/image-main.php'));

$video = get_field('vorschau_video', $id);
include(locate_template('inc/video-main.php'));

include(locate_template('inc/header-wrapper.php'));
?>

<div class="content">

	<div class="vorschau-projekte">
	  <?php
	  query_posts(array(
	    'post_type' => 'projekte'
	  ) );

	  while (have_posts()) : the_post();
	  ?>

	    <div class="vorschau-projekt">

				<?php
				$image = get_field('vorschau_bild');
				include(locate_template('inc/image-vorschau.php'));

				include(locate_template('inc/title-link.php'));

				$kurzer_text = get_field('kurzer_text');
				include(locate_template('inc/text-kurz.php'));
				?>

	    </div>

	  <?php
	  endwhile;
	  ?>
	</div>

</div>

<?php get_footer(); ?>
