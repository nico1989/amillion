$(document).ready(function(){
	
	$(document).on('scroll', function(){

		var scrollTop = $(document).scrollTop();

		TweenMax.set($('.bg .scroll-a'), {y: -(scrollTop/2)});
		TweenMax.set($('.bg .scroll-b'), {y: -(scrollTop/2.5)});
	});

	$('.btn-menu').on('click', function(e){
		e.preventDefault();

		$('.menu-main').toggleClass('open');

	});
		
});