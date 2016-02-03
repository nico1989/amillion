var popin = false;

var app = app || {};

$(document).ready(function(){

	$('.main-slideshow li, .projets-liste li').on('click', function(){

		var id = $(this).attr('data-id');
		app.showProject(id);

	});

});

app.showProject = function(id){

	console.log(id);

	setTimeout(function(){
		app.slideshow.stopAuto();
	}, 5000);

	$('.popin .loader').show();
	$('.popin .loader img').attr('src', './wp-content/themes/amillion/img/loader.gif');

	data = {
        action: 'filter_posts', // function to execute
        afp_nonce: afp_vars.afp_nonce, // wp_nonce
        taxonomy: '',
        term: '',
        id: id
    };

    $('.popin').show();

	setTimeout(function(){
		$('.popin').toggleClass('on');
	}, 300);


    $.post( afp_vars.afp_ajax_url, data, function(response) {

        if( response ) {

        	$('.popin .content, .popin .slideshow').remove();

        	$('#popin .wrapper').append(response);

        	setTimeout(function(){

				$('.popin').toggleClass('visible');
				$('.popin .loader').fadeOut();
		    	setTimeout(function(){
		    		$('.popin .loader img').attr('src', '');
		    	}, 500);

			}, 1500);

        	var mainW = $('.popin .wrapper').innerWidth();
			var w = (mainW*68)/100;
			var h = Math.round(w*9/16);

			$('.popin-slideshow').width(Math.floor(w));
			$('.popin-slideshow li').css('padding-bottom', h);

        	app.popinSlideshow = $('.popin-bxslider').bxSlider({
				mode: 'vertical',
				captions: true,
				pause: 6000,
  				speed: 1000,
  				auto: false,
				useCSS : true,
				easing: 'cubic-bezier(0.65, 0.08, 0.29, 0.96)',
				onSlideAfter: function($slide, o, n){

					var $iframes = $('.slideshow li').not($slide).find('iframe');

					$iframes.each(function(){

						var src = $(this).attr('src');
						$(this).attr('src', src);

					});

				}
			});

			$('html').on('click', '.slideshow.popin-slideshow .prev', function(e){
				e.preventDefault();

				app.popinSlideshow.goToPrevSlide();
			});

			$('html').on('click', '.slideshow.popin-slideshow .next', function(e){
				e.preventDefault();

				app.popinSlideshow.goToNextSlide();
			});


        };
    });

}



