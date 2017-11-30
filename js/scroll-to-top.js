jQuery( document ).ready(function() {

	jQuery(".middle").on("click", function() {
		var windowheight = jQuery( window ).height();
		var navigationheight = jQuery('.navigation').outerHeight();

		var scrollheight = windowheight - navigationheight;

		jQuery("html, body").animate({ scrollTop: scrollheight }, 600);
		return false;
	});

});
