jQuery( document ).ready(function() {

  jQuery(".vorschau-stueck").addClass("filter-active");

  jQuery( ".filter-all" ).click(function() {
    jQuery(".vorschau-stueck").addClass("filter-active");
  });

  jQuery( ".filter-get" ).click(function() {
    var filter = jQuery(this).html().toLowerCase();

    jQuery(".vorschau-stueck").removeClass("filter-active");
    jQuery("." + filter).addClass("filter-active");
  });

});
