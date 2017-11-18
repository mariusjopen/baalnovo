<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));
?>

<div class="content">

	<?php
	$kurzer_text = get_field('kurzer_text');
	include(locate_template('inc/text-kurz.php'));

	$images = get_field('gallerie');
	include(locate_template('inc/image-gallery.php'));

	$text_text = get_field('langer_text');
	include(locate_template('inc/text-lang.php'));

	$presse = 'presse';
	include(locate_template('inc/presse.php'));
	?>

</div>

<?php get_footer(); ?>
