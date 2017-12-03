jQuery( document ).ready(function() {

	jQuery(".scroll").on("click", function() {
		var windowheight = jQuery( window ).height();

		if (jQuery(window).width() < 700) {
			var navigationheight = jQuery('.navigation.mobile').outerHeight();
		}

		if (jQuery(window).width() > 700) {
			var navigationheight = jQuery('.navigation.desktop').outerHeight();
		}

		var scrollheight = windowheight - navigationheight;

		jQuery("html, body").animate({ scrollTop: scrollheight }, 600);
		return false;
	});

});
