<!-- START SPONSOREN -->
<?php
$size = '_768';
if( $images ):
?>

<div class="sponsoren">

	<?php
	foreach( $images as $image ):
	?>

	<div class="post">
		<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
	</div>

	<?php
	endforeach;
	?>

	</div>

<?php
endif;
?>
<!-- END SPONSOREN -->
