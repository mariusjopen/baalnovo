jQuery( document ).ready(function() {

   var sorted = Array.prototype.sort.call(jQuery(".post-event"), function(a,b){

     var date_a = jQuery(a).data("date");
     var date_b = jQuery(b).data("date");

     return new Date(date_a) < new Date(date_b) ;

   });

  jQuery(sorted).each(function(){
    jQuery(".spielplan").prepend(this);
  })

});
