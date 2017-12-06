<!-- START HEADER WRAPPER -->
<div class="menu">
	<?php	wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

	<?php
	include(locate_template('inc/navigation.php'));
	?>
</div>

<div class="wrapper">

<?php
include(locate_template('inc/navigation.php'));
?>
<!-- END HEADER WRAPPER -->
