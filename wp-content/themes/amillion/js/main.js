var app = app || {};
app.filter = {};
app.filter.slug = "";
app.filter.label = "";
app.menuStatus = false;

app.totalProjets = 0;

$(document).ready(function(){

	$(window).on('load', function(){

		setTimeout(function(){
			$('.loader-welcome').fadeOut();
		}, 500);

	});

	var $btnMenu = $('.btn-menu');
	var $menu = $('.menu-main');
	var filterCursor = 9;
	app.totalProjets = $('.projets-liste li').size();

	init();
	
	$(document).on('scroll', function(){
		updateHeader();
	});


	$(window).on('resize', function(){

		var mainW = $('.popin .wrapper').innerWidth();
		var w = (mainW*68)/100;
		var h = Math.round(w*9/16);

		$('.popin-slideshow').width(Math.floor(w));
		$('.popin-slideshow li').css('padding-bottom', h);

	});

	$('html').on('click', function() {

		if(app.menuStatus){

			$btnMenu.removeClass('open');
			$menu.removeClass('open');
			toggleMenu('close');
		}

		$('.wrapper-dropdown').removeClass('active');
	});


	$('.projets-more').on('click', function(e){
		e.preventDefault();

		filterCursor += 9;

		if(app.filter.status == "brand"){
			showProjects($('.projets-liste li[data-brand="'+app.filter.slug+'"]').slice(filterCursor-9, filterCursor));
		}else if(app.filter.status == "type"){
			showProjects($('.projets-liste li[data-type="'+app.filter.slug+'"]').slice(filterCursor-9, filterCursor));
		}else{
			showProjects($('.projets-liste li').slice(filterCursor-9, filterCursor));
		}

		if(filterCursor > app.totalProjets){
			$('.projets-more').addClass('off');
		}
	});

	$('.menu-main, .btn-menu').on('click', function(event){
	    event.stopPropagation();
	});

	$('.btn-menu').on('click', function(e){
		e.preventDefault();

		toggleMenu();
	});

	$('.menu-main .scroll-to').on('click', function(e){
		e.preventDefault();

		toggleMenu('close');
	});


	$('.scroll-to').on('click', function(e){
		e.preventDefault();

		var target = $(this).attr('href');
		scrollTo($(target));
	});

	$('.btn-backtotop').on('click', function(e){
		e.preventDefault();
		scrollTo($('body'));
	});

	$('html .popin').on('click', '.btn-close-popin', function(e){
		e.preventDefault();

		$('.popin').removeClass('on');
		$('.popin').removeClass('visible');
		console.log('start');

		app.slideshow.startAuto();

		setTimeout(function(){
			$('.popin').hide();
			$('iframe').attr('src', '');
		}, 500);
	});

	$(document).keyup(function(e) {
	  if (e.keyCode == 27){

	  	$('.popin').removeClass('on');
		$('.popin').removeClass('visible');
		console.log('start');

		app.slideshow.startAuto();

		setTimeout(function(){
			$('.popin').hide();
			$('iframe').attr('src', '');
		}, 500);

	  }
	});


	$('.wrapper-dropdown').on('click', function(e){

		if(!$(this).hasClass('active')){
			$('.wrapper-dropdown').removeClass('active');
			$(this).addClass('active');
		}else{

			$('.wrapper-dropdown').removeClass('active');
		}

		e.stopPropagation();
	});


	$('.filter a').on('click', function(e){

		e.preventDefault();

		if($(this).hasClass('on')){
			return false;
		}

		$('.wrapper-dropdown a').removeClass('on');
		$(this).addClass("on");
		
		app.filter.slug = $(this).attr('data-value');
		app.filter.label = $(this).text();

		$(this).parents('.wrapper-dropdown').find('.label').text(app.filter.label);

		filterCursor = 9;
		$('.projets-liste li').removeClass('on');
		$('.projets-liste li').removeClass('visible');
		
		if(app.filter.slug == ""){

			showProjects($('.projets-liste li').slice(0, 9));
			app.totalProjets = $('.projets-liste li').size();
			app.filter.status = "";

		}else if($(this).parents('.wrapper-dropdown').hasClass('filter-type')){
			
			$('.filter-brand').find('.label').text('Brand');
			showProjects($('.projets-liste li[data-type="'+app.filter.slug+'"]').slice(0, 9));
			app.totalProjets = $('.projets-liste li[data-type="'+app.filter.slug+'"]').size();

			console.log(app.totalProjets);
			app.filter.status = "type";

		}else{

			$('.filter-type').find('.label').text('Type');
			showProjects($('.projets-liste li[data-brand="'+app.filter.slug+'"]').slice(0, 9));
			app.totalProjets = $('.projets-liste li[data-brand="'+app.filter.slug+'"]').size();
			app.filter.status = "brand";
		}	

		if (app.totalProjets < 10){
       		$('.projets-more').addClass('off');
       	}else{
       		$('.projets-more').removeClass('off');
       	}

	});



function init(){
	updateHeader();
	showProjects($('.bloc-projets li:nth-child(-n+'+filterCursor+')'));
}



function showProjects(projects){
	var lapse = 0;
	var $projects = projects;
	$projects.addClass('on');

	for (var i = 0; i < $projects.length; i++) {

		lapse += 100;
		(function(){
			var cursor = i;
			setTimeout(function(){
				$projects.eq(cursor).addClass('visible');
			}, lapse);
		}());
	};

	if(filterCursor > app.totalProjets){
		$('.projets-more').addClass('off');
	}
}

function updateHeader(){

	var scrollTop = $(document).scrollTop();

	TweenMax.set($('.bg .scroll-a'), {y: -(scrollTop/1.2)});
	TweenMax.set($('.bg .scroll-b'), {y: -(scrollTop/1.5)});
	TweenMax.set($('.bg .scroll-c'), {y: - scrollTop});

	if($(this).scrollTop() > 0){
		$('header').addClass('small');
	}else{
		$('header').removeClass('small');
	}
}


function scrollTo(target){

	if (target.length) {
		$('html,body').animate({
		  scrollTop: target.offset().top - 115
		},{
		  duration: 2000,
		  easing: "easeInOutQuart"
		});
	}
}

function toggleMenu(action){

	if($('.menu-main').hasClass("open") || action == 'close'){

		app.menuStatus = false;

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

		TweenMax.to($('.btn-menu .burger span'), 0.2, {y: 0, rotation: 0, ease: Power2.easeOut});
		TweenMax.to($('.btn-menu .burger span').eq(1), 0.2, {opacity: 1, delay: 0.2, ease: Power2.easeOut});

	}else{

		console.log("toggle");

		app.menuStatus = true;

		$btnMenu.find('.txt').hide();
		$btnMenu.find('.txt').text('Close');

		$menu.show();

		setTimeout(function(){
			$btnMenu.addClass('open');
			$menu.addClass('open');
		}, 100);

		setTimeout(function(){

			var i = 200;
			var interval = 20;
			
			$('.menu-main .hidden').each(function(){
				var scope = $(this);

				(function(){

					var that = scope;

					setTimeout(function(){
						that.removeClass('hidden');
					}, i);

				}());

				i = (i + interval)/0.95;
			});

			$btnMenu.find('.txt').fadeIn(500);

		}, 200);

		TweenMax.to($('.btn-menu .burger span').eq(0), 0.2, {y: 6, ease: Power2.easeOut});
		TweenMax.to($('.btn-menu .burger span').eq(2), 0.2, {y: -6, ease: Power2.easeOut});

		TweenMax.to($('.btn-menu .burger span').eq(1), 0.2, {opacity: 0, ease: Power2.easeOut});

		TweenMax.to($('.btn-menu .burger span').eq(0), 0.2, {rotation: -45, delay: 0.2, ease: Power2.easeOut});
		TweenMax.to($('.btn-menu .burger span').eq(2), 0.2, {rotation: 45, delay: 0.2, ease: Power2.easeOut});

	}

}
		
});


