<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));

$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));

$video = get_field('vorschau_video');
include(locate_template('inc/video-main.php'));

include(locate_template('inc/header-wrapper.php'));
?>

<div class="content">

	<?php
	$kurzer_text = get_field('kurzer_text');
	include(locate_template('inc/text-kurz.php'));

	$flex = 'inhalt';
	include(locate_template('inc/flex.php'));
	?>

</div>

<?php get_footer(); ?>
