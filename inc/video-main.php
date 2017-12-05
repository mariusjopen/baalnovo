<!-- START VIDEO MAIN -->
<?php if( $video ): ?>
		
	<div class="video-main">

		<video playsinline autoplay muted loop>
			<source src="<?php echo $video ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>

	</div>

<?php endif; ?>
<!-- END VIDEO MAIN -->
