$(document).ready(function(){

	var $btnMenu = $('.btn-menu');
	var $menu = $('.menu-main');
	var menuStatus = 0;
	
	$(document).on('scroll', function(){

		var scrollTop = $(document).scrollTop();

		TweenMax.set($('.bg .scroll-a'), {y: -(scrollTop/2)});
		TweenMax.set($('.bg .scroll-b'), {y: -(scrollTop/2.5)});

		if($(this).scrollTop() > 0){
			$('header').addClass('small');
		}else{
			$('header').removeClass('small');
		}

	});

	$('html').on('click', function() {

		if(menuStatus){
			$btnMenu.removeClass('open');
			$menu.removeClass('open');
			toggleMenu('close');
		}
		
	});

	$('.menu-main, .btn-menu').on('click', function(event){
	    event.stopPropagation();
	});

	$('.btn-menu').on('click', function(e){
		e.preventDefault();

		toggleMenu();
	});

	$('.scroll-to').on('click', function(e){
		e.preventDefault();

		toggleMenu();

		var target = $(this).attr('href');
		scrollTo($(target));
	});

	$('.btn-backtotop').on('click', function(e){
		e.preventDefault();
		scrollTo($('body'));
	});


	function scrollTo(target){

		if (target.length) {
			$('html,body').animate({
			  scrollTop: target.offset().top
			},{
			  duration: 1000,
			  easing: "easeOutQuart"
			});
		}
	}

	function toggleMenu(action){

		if($('.menu-main').hasClass("open") || action == 'close'){

			menuStatus = 0;

			$btnMenu.find('.txt').hide();
			$btnMenu.find('.txt').text('Menu');

			$btnMenu.removeClass('open');
			$menu.removeClass('open');

			setTimeout(function(){
				$menu.hide();
			}, 100);

			setTimeout(function(){
				$btnMenu.find('.txt').fadeIn(300);
				$('.menu-main div > a, .menu-main div > p').addClass('hidden');
			}, 200);

			TweenMax.to($('.burger span'), 0.2, {y: 0, rotation: 0, ease: Power2.easeOut});
			TweenMax.to($('.burger span').eq(1), 0.2, {opacity: 1, delay: 0.2, ease: Power2.easeOut});

		}else{

			menuStatus = 1;

			$btnMenu.find('.txt').hide();
			$btnMenu.find('.txt').text('Close');

			$menu.show();

			setTimeout(function(){
				$btnMenu.addClass('open');
				$menu.addClass('open');
			}, 100);

			setTimeout(function(){

				var i = 200;
				var interval = 100;
				
				$('.menu-main .hidden').each(function(){
					var scope = $(this);

					(function(){

						var that = scope;

						setTimeout(function(){
							that.removeClass('hidden');
						}, i);

					}());

					i = i + interval;

				});

				$btnMenu.find('.txt').fadeIn(500);


			}, 200);

			TweenMax.to($('.burger span').eq(0), 0.2, {y: 6, ease: Power2.easeOut});
			TweenMax.to($('.burger span').eq(2), 0.2, {y: -6, ease: Power2.easeOut});

			TweenMax.to($('.burger span').eq(1), 0.2, {opacity: 0, ease: Power2.easeOut});

			TweenMax.to($('.burger span').eq(0), 0.2, {rotation: -45, delay: 0.2, ease: Power2.easeOut});
			TweenMax.to($('.burger span').eq(2), 0.2, {rotation: 45, delay: 0.2, ease: Power2.easeOut});

		}

	}
		
});