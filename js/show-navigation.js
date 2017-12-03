jQuery( document ).ready(function() {

		var navigationheight = jQuery('.navigation').outerHeight();

		jQuery(".wrapper").css({"margin-top": -navigationheight});

});
