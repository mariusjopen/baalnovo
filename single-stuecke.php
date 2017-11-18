<?php get_header(); ?>

<?php
$string = $_SERVER['QUERY_STRING'] ;
$numSymbols = 24;
$res_string = substr($string, 0, $numSymbols);
$trimmed = ltrim($res_string, "date_time=");
$date_url = $trimmed;
?>

<p><?php wp_title(''); ?></p>

<?php
$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));
?>

<div class="content">

	<div class="untertitel">
		<p><?php the_field('untertitel'); ?></p>
	</div>

	<?php
	$kurzer_text = get_field('kurzer_text');
	include(locate_template('inc/text-kurz.php'));

	$event = 'events';
	include(locate_template('inc/events-this.php'));

	$image = get_field('poster');
	include(locate_template('inc/image-poster.php'));

	include(locate_template('inc/mitwirkende.php'));

	include(locate_template('inc/technische-details.php'));

	$text_text = get_field('langer_text');
	include(locate_template('inc/text-lang.php'));

	include(locate_template('inc/zitate.php'));

	$images = get_field('gallerie');
	include(locate_template('inc/image-gallery.php'));

	$events = 'events';
	include(locate_template('inc/events-all.php'));

	$images = get_field('sponsoren');
	include(locate_template('inc/sponsoren.php'));

	$presse = 'presse';
	include(locate_template('inc/presse.php'));
	?>

</div>

<?php get_footer(); ?>
