jQuery( document ).ready(function() {

   var sorted = Array.prototype.sort.call(jQuery(".post-event"), function(a,b){

     var date_a = jQuery(a).data("date").replace(':', '');
     var date_b = jQuery(b).data("date").replace(':', '');

     var new_date_a = parseInt(date_a,14);
     var new_date_b = parseInt(date_b,14);

     return new Date(new_date_a) < new Date(new_date_b) ;

   });



  jQuery(sorted).each(function(){
    jQuery(".spielplan").prepend(this);
  })

});
