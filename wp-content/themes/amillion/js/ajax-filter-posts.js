$(document).ready(function(){

	$('.filter').on('change', function(){

		if($(this).hasClass('filter-type')){
			var type = 'category';
		}else{
			var type = 'post_tag';
		}		

		var slug = $(this).val();
		data = {
	        action: 'filter_posts', // function to execute
	        afp_nonce: afp_vars.afp_nonce, // wp_nonce
	        taxonomy: type,
	        term: slug, // selected term

	        };

	    $.post( afp_vars.afp_ajax_url, data, function(response) {

	        if( response ) {	        	
	        	$('.projets-liste ul').empty();
	        	$('.projets-liste ul').append(response);
	        };
	    });

	});


});



