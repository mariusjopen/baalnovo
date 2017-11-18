<?php get_header(); ?>

<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

	<?php
	$flex = 'inhalt';
	include(locate_template('inc/flex.php'));
	?>

</div>



<?php get_footer(); ?>
