var app = app || {};

$(document).ready(function(){

	app.slideshow = $('.bxslider').bxSlider({
	  mode: 'vertical',
	  captions: true,
	  pause: 6000,
	  auto: true,
	  autoHover: true,
	  speed: 1000,
	  useCSS : true,
	  easing: 'cubic-bezier(0.65, 0.08, 0.29, 0.96)'

	});

	$('.slideshow.main-slideshow .prev').on('click', function(e){
		e.preventDefault();

		app.slideshow.goToPrevSlide();
	});

	$('.slideshow.main-slideshow .next').on('click', function(e){
		e.preventDefault();

		app.slideshow.goToNextSlide();
	});

	$('.slideshow.main-slideshow .slideshow-frame nav').on('mouseenter', function(e){
		app.slideshow.stopAuto();
	});

	$('.slideshow.main-slideshow .slideshow-frame nav').on('mouseleave', function(e){
		app.slideshow.startAuto();
	});

});




