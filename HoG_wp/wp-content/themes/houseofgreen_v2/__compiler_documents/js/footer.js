
jQuery(document).ready(function($){



	// Check if body height is higher than window height :)
	if ( window.innerWidth > document.documentElement.clientWidth ) {
        $('.footer .topper').removeClass('transparant');
        //console.log('longer');
    }

	$('.footer .topper').on( 'click', function() {

		$('html, body').animate({ scrollTop: 0 }, 1000);
		event.preventDefault();
	});


});

$(window).resize(function(){

});