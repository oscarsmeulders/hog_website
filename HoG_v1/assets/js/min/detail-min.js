jQuery(document).ready(function($){

	// maak een array met de bijschriften om deze te kunnen gebruiken in de geselecteerde cell.
	var bijschriften = [];
	$('.gallery').find('.gallery-cell').each(function() { bijschriften.push( $(this).attr("data-text") ) });

	// maak de gallery
	var $gallery = $('.gallery').flickity({
		// options
		cellAlign: 'center',
		contain: true,
		wrapAround: true,
		prevNextButtons: false,
		pageDots: false,
		resize: true
	});
	var flkty = $gallery.data('flickity');

	// maak button actions, next wrapped
	$('.button-next-gallery').on( 'click', function() {
		$gallery.flickity( 'next', true );
	});
	$('.button-previous-gallery').on( 'click', function() {
		$gallery.flickity( 'previous', true );
	});


	// Als een cell wordt geselecteerd verander dan het bijschrift, de bijschriften staan in een array.
	$gallery.on( 'cellSelect', function() {
		//console.log( 'Flickity select, show bijschrift : ' + bijschriften[ flkty.selectedIndex ] );
		$( "div.container-gallery .title" ).html( bijschriften[ flkty.selectedIndex ] );
	})
	$( "div.container-gallery .title" ).html( bijschriften[ 0 ] );

});

// reload de pagina zodra deze wordt geresized, want dan blijft de gallery qua hoogte goed!
$(window).resize(function(){
	location.reload();
});

