<!-- START VORSCHAU AKTUELLES -->
<?php
include(locate_template('inc/title-link.php'));

$image = get_field('vorschau_bild');
include(locate_template('inc/image-main.php'));

$kurzer_text = get_field('kurzer_text');
include(locate_template('inc/text-kurz.php'));
?>
<!-- END VORSCHAU AKTUELLES -->
