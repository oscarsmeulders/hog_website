jQuery(document).ready(function($){


	var map, bij, bijx, bijy, bijbox, flight_path, typo, last_point, playing;

	window.onload = function () {
		playing 		= false;
		map				= Snap('#svg-logo');
		bij				= map.select('#bij');
		bijbox			= bij.getBBox();
		flight_path		= map.path('M0,0c0-63.5,51.5-114.9,114.9-114.9S273.9-63.5,273.9,0s-95.4,114.9-158.9,114.9C53.6,114.9,3.4,60.5,0,0').attr({ 'fill': 'none', 'stroke': 'none'});
		time 			= 2000;
		flight_path_length  = Snap.path.getTotalLength(flight_path);
		last_point          = flight_path.getPointAtLength(flight_path_length);

		startPoint = Snap.path.getPointAtLength( flight_path, 0 );
		startbijx =	bijbox.cx;
		startbijy =	bijbox.cy;
		startx =  	bijy + - (bijbox.width/2);
		starty = 	bijy + - (bijbox.height/2);
		//logoPlay();

	};

	$('.logo').on('click', function(event){
		if (!playing){
			playing = true;
			logoPlay();
			setTimeout(function(){
				window.location.href = siteUrl;
			}, (time-500));

		}
	});

	function logoPlay() {

		Snap.animate(0, flight_path_length, function( step ) {
				moveToPoint = Snap.path.getPointAtLength( flight_path, step );
				bijx =	bijbox.cx;
				bijy =	bijbox.cy;
				x =  	bijy + moveToPoint.x - (bijbox.width/2);
				y = 	bijy + moveToPoint.y - (bijbox.height/2);

				bij.transform('translate(' + x + ',' + y + ') rotate('+ (moveToPoint.alpha - 88)+', '+bijbox.cx+', '+bijbox.cy+')')
			}, time, mina.easein ,function() {
				bij.transform('translate(' + startx + ',' + starty + ') rotate(0, '+startbijx+', '+startbijy+')');
				playing = false;
			}
		);


	}



	function menuButtonChange() {

		if ( $('body').hasClass('navigation-is-open') ) {
			$('.button-menu').html( menuBT_closed );
			$tmpW = $('.button-menu').outerWidth();
			$('.button-menu').css("margin-left", -1 * $tmpW);
		} else {
			$('.button-menu').html( menuBT_open );
			$tmpW = $('.button-menu').outerWidth();
			$('.button-menu').css("margin-left", 0);
		}

	}
	menuButtonChange();

	PointerEventsPolyfill.initialize({});

	var isLateralNavAnimating = false;

	//open/close lateral navigation
	$('.button-menu').on('click', function(event){
		event.preventDefault();


		//stop if nav animation is running
		if( !isLateralNavAnimating ) {
			if($(this).parents('.csstransitions').length > 0 ) isLateralNavAnimating = true;
			$('body').toggleClass('navigation-is-open');
			$('body').removeClass('search-is-open');
			menuButtonChange();
			$('.hog-navigation-wrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				//animation is over
				isLateralNavAnimating = false;
			});
		}
/*
		if ('.navigation-is-open') {
			$tmp = -1 * $('.button-menu').width();
			$('.button-menu').css('margin-left', $tmp);
			console.log( $tmp );
		} else {
			$('.button-menu').css('margin-left', 0);
		}
*/
	});

	$('.button-search').on('click', function(event) {
		event.preventDefault();
		$('body').removeClass('navigation-is-open');
		$('body').toggleClass('search-is-open');
		$('.input-search').focus();
	});

});

$(document).mouseup(function (e) {
	var container = $('.hog-nav');

	if (!container.is(e.target) // if the target of the click isn't the container...
		&& container.has(e.target).length === 0) // ... nor a descendant of the container
	{
		//$('body').removeClass('navigation-is-open');
	}
});