<!-- START NAVIGATION -->
<div class="navigation desktop">

	<div class="left">
		<?php dynamic_sidebar( 'languages' ); ?>
	</div>

	<div class="middle scroll">
		<?php wp_title(''); ?>
	</div>

	<div class="start scroll">
		<?php echo get_bloginfo( 'name' ); ?> - <?php echo get_bloginfo( 'description' ); ?>
	</div>

	<div class="right menu-button">
		<?php the_field('menu', 'option'); ?>
	</div>

</div>

<div class="navigation mobile">

	<div class="middle scroll">
		<?php wp_title(''); ?>
	</div>

	<div class="start scroll">
		<?php echo get_bloginfo( 'name' ); ?> - <?php echo get_bloginfo( 'description' ); ?>
	</div>

	<div class="left">
		<?php dynamic_sidebar( 'languages' ); ?>
	</div>

	<div class="right menu-button">
		<?php the_field('menu', 'option'); ?>
	</div>

</div>
<!-- END NAVIGATION -->
