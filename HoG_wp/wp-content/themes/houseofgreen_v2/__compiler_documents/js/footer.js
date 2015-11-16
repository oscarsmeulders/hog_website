jQuery(document).ready(function($){


	$('.footer .topper').on( 'click', function() {

		$('html, body').animate({ scrollTop: 0 }, 1000);
		event.preventDefault();
	});


});

$(window).resize(function(){

});