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

	include(locate_template('inc/integrierte-stuecke.php'));

	$flex = 'inhalt';
	include(locate_template('inc/flex.php'));

	$presse = 'presse';
	include(locate_template('inc/presse.php'));
	?>

</div>

<?php get_footer(); ?>
