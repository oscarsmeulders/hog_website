jQuery(document).ready(function($){
	var isLateralNavAnimating = false;

	//open/close lateral navigation
	$('.button-menu').on('click', function(event){
		event.preventDefault();
		//stop if nav animation is running
		if( !isLateralNavAnimating ) {
			if($(this).parents('.csstransitions').length > 0 ) isLateralNavAnimating = true;

			$('body').toggleClass('navigation-is-open');
			$('body').removeClass('search-is-open');
			$('.hog-navigation-wrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				//animation is over
				isLateralNavAnimating = false;
			});
		}
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
		$('body').removeClass('navigation-is-open');
	}
});

