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


	$('.main-slideshow li').on('click', function(){

		var id = $(this).attr('data-id');

		console.log(id);


		data = {
	        action: 'filter_posts', // function to execute
	        afp_nonce: afp_vars.afp_nonce, // wp_nonce
	        taxonomy: '',
	        term: '',
	        id: id

	        };

	    $.post( afp_vars.afp_ajax_url, data, function(response) {

	        if( response ) {	       
				
				console.log(response);

	        	$('.popin').toggleClass('on');
				setTimeout(function(){
					$('.popin').toggleClass('visible');
				}, 300);

	        	$('.popin .bx-wrapper').remove();
	        	$('.popin-slideshow').append('<ul class="popin-bxslider"></ul>');
	        	$('.popin-bxslider').append(response);

	        	var popinSlideshow = $('.popin-bxslider').bxSlider({
				  mode: 'vertical',
				  captions: true,
				  pause: 6000
				});

				$('html').on('click', '.slideshow.popin-slideshow .prev', function(e){
					e.preventDefault();

					popinSlideshow.goToPrevSlide();
				});

				$('html').on('click', '.slideshow.popin-slideshow .next', function(e){
					e.preventDefault();

					popinSlideshow.goToNextSlide();
				});


	        };
	    });

	});


});



