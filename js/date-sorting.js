jQuery( document ).ready(function() {

	var yourArray = [];

	jQuery('.shuffle').each(function() {
	  yourArray.push(
			jQuery(this).attr('data-date').split(' ')[0]
		);
	});

	var yourArray_sort = _.sortBy(yourArray, [ ]);


	jQuery.each(yourArray_sort, function(index, item) {
    console.log(item);

		jQuery('.shuffle[data-date="' + item + '"]').clone().appendTo( ".spielplan-inside" );
	});



});
