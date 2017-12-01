jQuery( document ).ready(function() {

	jQuery(".menu-button").on("click", function() {
		jQuery("body").toggleClass("menu-active");
	});

	jQuery(".scroll").on("click", function() {
		jQuery("body").removeClass("menu-active");
	});

});
