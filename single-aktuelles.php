<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));
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
