jQuery( document ).ready(function() {

  jQuery(".post-stuecke").addClass("filter-active");

  jQuery( ".filter-all" ).click(function() {
    jQuery(".post-stuecke").addClass("filter-active");
  });

  jQuery( ".filter-get" ).click(function() {
    var filter = jQuery(this).html().toLowerCase();
    
    jQuery(".post-stuecke").removeClass("filter-active");
    jQuery("." + filter).addClass("filter-active");
  });

});
