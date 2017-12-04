<?php get_header(); ?>

<?php
$string = $_SERVER['QUERY_STRING'] ;
$numSymbols = 24;
$res_string = substr($string, 0, $numSymbols);
$trimmed = ltrim($res_string, "date_time=");
$date_url = $trimmed;
?>

<?php
include(locate_template('inc/head.php'));
?>

<div class="content">

	<?php
	$untertitel = get_field('untertitel');
	include(locate_template('inc/untertitel.php'));

	$event = 'events';
	include(locate_template('inc/events-this.php'));

	$image = get_field('poster');
	include(locate_template('inc/image-poster.php'));

	$kurzer_text = get_field('kurzer_text');
	include(locate_template('inc/text-kurz.php'));


	include(locate_template('inc/mitwirkende.php'));

	include(locate_template('inc/technische-details.php'));

	$text_text = get_field('langer_text');
	include(locate_template('inc/text-lang.php'));

	include(locate_template('inc/zitate.php'));

	$images = get_field('gallerie');
	include(locate_template('inc/image-gallery.php'));

	$flex = 'inhalt';
	include(locate_template('inc/flex.php'));

	$events = 'events';
	include(locate_template('inc/events-all.php'));

	$images = get_field('sponsoren');
	include(locate_template('inc/sponsoren.php'));

	$presse = 'presse';
	include(locate_template('inc/presse.php'));
	?>

</div>

<?php get_footer(); ?>
