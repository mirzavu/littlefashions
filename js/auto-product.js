
$(document).ready(function(){

$('#rpoduct_name').autocomplete({


		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'auto_product.php',
		      			dataType: "json",
						data: {
						   name_startsWith: request.term,
						   type: 'litprod'
						},
						 success: function( data ) {


                                                          
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0      	
		      });
});
