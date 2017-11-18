<!-- START DOWNLOAD -->
<div class="download">

	<div class="content-title">
		<?php echo $download_name ?>
	</div>

	<div class="content-row">
	<?php
	query_posts(array(
		'post_type' => $download,
		'orderby' => 'title',
		'order'   => 'ASC'
	) );

	while (have_posts()) : the_post();
	?>

		<div class="post">

			<?php
			$presse = 'presse';
			include(locate_template('inc/presse.php'));
			?>

		</div>

	<?php
	endwhile;
	?>
</div>

</div>
<!-- END DOWNLOAD -->
