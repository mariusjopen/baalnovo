<!-- START VORSCHAU STUECKE -->
<a href="<?php the_permalink() ?>">
	<?php
	$image = get_field('poster');
	include(locate_template('inc/image-poster.php'));
	?>
</a>

<?php
include(locate_template('inc/title-link.php'));
?>
<!-- END VORSCHAU STUECKE -->
