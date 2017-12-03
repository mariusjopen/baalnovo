jQuery( document ).ready(function() {
	if (jQuery(window).width() < 700) {
		var navigationheight_mob = jQuery('.navigation.mobile').outerHeight();
		jQuery(".wrapper").css({"margin-top": -navigationheight_mob});
	}

	if (jQuery(window).width() > 700) {
		var navigationheight = jQuery('.navigation.desktop').outerHeight();
		jQuery(".wrapper").css({"margin-top": -navigationheight});
	}
});
