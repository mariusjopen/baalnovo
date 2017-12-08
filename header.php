<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    <!-- <link rel="stylesheet"  href="<?php echo get_template_directory_uri(); ?>/style.css" >
		<link rel="stylesheet"  href="<?php echo get_template_directory_uri(); ?>/css/main.css" > -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> >
