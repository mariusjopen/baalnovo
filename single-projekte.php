<?php get_header(); ?>

<?php
include(locate_template('inc/head.php'));
?>

<div class="content">

	<?php
	$kurzer_text = get_field('kurzer_text');
	include(locate_template('inc/text-kurz.php'));

	include(locate_template('inc/integrierte-stuecke.php'));

	$flex = 'inhalt';
	include(locate_template('inc/flex.php'));

	$images = get_field('sponsoren');
	include(locate_template('inc/sponsoren.php'));

	$presse = 'presse';
	include(locate_template('inc/presse.php'));
	?>

</div>

<?php get_footer(); ?>
