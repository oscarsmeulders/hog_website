// http://stackoverflow.com/questions/901115/how-can-i-get-query-string-values-in-javascriptvar urlParams;
(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();

jQuery(document).ready(function($){
	$tempFilter = '.' + urlParams["filter"];
	//alert( $tempFilter);

	////////////////////////////////////////////////////////////////////////////////////
	///// isotope stuff

	var $win = $(window),
		$imgs = $('img.ll'),
		$con = $('.listing');

	function loadVisible($els, trigger) {
		$els.filter(function () {
			var rect = this.getBoundingClientRect();
			return rect.top >= 0 && rect.top <= window.innerHeight;
		}).trigger(trigger);
	}

	$win.on('scroll', function () {
		loadVisible($imgs, 'lazylazy');
	});

	$imgs.lazyload({
		effect: "fadeIn",
		failure_limit: Math.max($imgs.length - 1, 0),
		event: 'lazylazy'
	});
	//




	// http://codepen.io/desandro/pen/btFfG
	// http://codepen.io/desandro/pen/wjHEo // beter
	var filters = {};
	var $filterDisplay = $('#filter-display');

	$('input[type=checkbox]').each(function () {
		if (this.checked) {
			manageCheckbox( $(this) );
			//console.log ('target :' + $(this));
		}
	});
	var comboFilter = getComboFilter( filters );
	//var comboFilterSingle = getFilter( );
	//var comboFilterCombined = comboFilterSingle.join(comboFilter);
	//console.log( comboFilter );

	$con.isotope({ filter: comboFilter });
	$filterDisplay.text( comboFilter );


	// do stuff when checkbox change
	$('.filters-menu').on( 'change', function( jQEvent ) {
		var $checkbox = $( jQEvent.target );
		//console.log ('target :' + $checkbox);
		manageCheckbox( $checkbox );
		var comboFilter = getComboFilter( filters );

		$con.isotope({ filter: comboFilter });
		$filterDisplay.text( comboFilter );
	});

	//////////////////////////////////////////////////////////////////////////////////////////////////
	function getComboFilter( filters ) {
	  var i = 0;
	  var comboFilters = [];
	  var message = [];

	  for ( var prop in filters ) {
	    message.push( filters[ prop ].join(' ') );
	    var filterGroup = filters[ prop ];
	    // skip to next filter group if it doesn't have any values
	    if ( !filterGroup.length ) {
	      continue;
	    }
	    if ( i === 0 ) {
	      // copy to new array
	      comboFilters = filterGroup.slice(0);
	    } else {
	      var filterSelectors = [];
	      // copy to fresh array
	      var groupCombo = comboFilters.slice(0); // [ A, B ]
	      // merge filter Groups
	      for (var k=0, len3 = filterGroup.length; k < len3; k++) {
	        for (var j=0, len2 = groupCombo.length; j < len2; j++) {
	          filterSelectors.push( groupCombo[j] + filterGroup[k] ); // [ 1, 2 ]
	        }

	      }
	      // apply filter selectors to combo filters for next group
	      comboFilters = filterSelectors;
	      //console.log ("start : " + comboFilters);
	    }
	    i++;
	  }

	  var comboFilter = comboFilters.join(', ');
	 //console.log ('return : ' + comboFilter);
	  return comboFilter;
	}

function manageCheckbox( $checkbox ) {
  var checkbox = $checkbox[0];

  var group = $checkbox.parents('.option-set').attr('data-group');

  // create array for filter group, if not there yet
  filterGroup = filters[ group ];

  if ( !filterGroup ) {
  	filterGroup = filters[ group ] = [];
  }


  // index of
  var index = $.inArray( checkbox.value, filterGroup );

  if ( checkbox.checked ) {
  	//console.log ('checkbox.checked : ' + checkbox.value);
    if ( index === -1 ) {
      // add filter to group
      filters[ group ].push( checkbox.value );
    }
  } else {
    // remove filter from group
    filters[ group ].splice( index, 1 );
  }

}












	////////////////////////////////////////////////////////////////////////////////////
	// filter items on button click
	$('.filters').on( 'click', 'button', function() {

		var filterValue = $(this).attr('data-filter');
		changeClasses( $(this) );

		window.location.hash = filterValue;

		isotopeFilter(filterValue);

		$('html, body').animate({ scrollTop: 0 }, 'fast');
	});
	//
	////////////////////////////////////////////////////////////////////////////////////
	// Change classes of filter buttons
	//
	changeClasses = function (who) {
		if ( $( who ).attr('id') == 'filter-showall') {
			if ( $(who).hasClass('hidden')) {
				$(who).removeClass('hidden');
			} else {
				$(who).addClass('hidden').delay(200).queue(function(next){
					$(who).addClass('displayNone').dequeue();
					});
			}
		} else {
			$('#filter-showall').removeClass('hidden displayNone');
		}
		$('.filters button').removeClass('active');
		$(who).addClass('active');
	}
	////////////////////////////////////////////////////////////////////////////////////
	var colWidth = function () {
		var w = $con.width(),
			columnNum = 1,
			columnWidth = 0;
		if (w > 1600) {
			columnNum  = 4;
		} else if (w > 1200) {
			columnNum  = 3;
		} else if (w > 992) {
			columnNum  = 3;
		} else if (w > 768) {
			columnNum  = 3;
		} else if (w > 480) {
			columnNum  = 2;
		} else {
			columnNum  = 1;
		}
		columnWidth = Math.floor(w/columnNum);
		$con.find('.item').each(function() {
			// console.log('item found');
			var $item = $(this),
				multiplier_w = $item.attr('class').match(/item-w(\d)/),
				multiplier_h = $item.attr('class').match(/item-h(\d)/),
				width = multiplier_w ? columnWidth*multiplier_w[1] : columnWidth,
				height = multiplier_h ? columnWidth*multiplier_h[1]*0.66666666 : columnWidth*0.66666666;
			$item.css({
				width: width,
				height: height
			});
		});
		return columnWidth;
	};


	isotope = function () {
		$con.isotope({
			itemSelector: '.item',
			masonry: {
				columnWidth: colWidth()
			}
		});
	};
	isotopeFilter = function(hash) {
		console.log('isotope filter : ' + hash);
		$con.isotope({ filter: hash });
	}


	hash = window.location.hash.substr(1);
	isotope();
	if (hash) {
		console.log ('hash : ' + hash);
		isotopeFilter(hash);

		$('.filters').find('button').each(function() {
			if ($(this).attr('data-filter') == hash) {
				changeClasses( $(this) );
			}
		});


	}

	$win.on('debouncedresize', isotope);


	$con.isotope('on', 'layoutComplete', function () {
		loadVisible($imgs, 'lazylazy');
	});

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// fade in random all items
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function Shuffle(o) {
		for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		return o;
	};

	var portfolioFades = [];
	$con.find('.item').each(function() { portfolioFades.push($(this)) });

	//Shuffle(portfolioFades);

	for (var i=0;i < portfolioFades.length;i++) {
		var $dly = i*250;
		portfolioFades[i].delay($dly).queue(function(next){
			$(this).addClass('loaded').dequeue();
		});
	}


	// overview page hover over item, fade the rest away
	if ( $('.overview').length ) {
		$('.no-touch').find('.item').on( 'mouseover', function() {
			allToAlpha( $(this) );
		});
		$('.no-touch').find('.item').on( 'mouseout', function() {
			$('.item').each(function() {
				$(this).removeClass('active');
			});
		});
	}

	function allToAlpha( who ) {
		$('.item').each(function() {
			$(this).addClass('active');
		});
		$(who).removeClass('active');
	}

	$('.button-filters').on('click', function(event){
		//console.log('click on filters');
		event.preventDefault();
		if ( $('.filters-menu').hasClass('closed') ) {

			$('.button-filters').removeClass('closed');

			$('.filters-menu').removeClass('hidden').delay(10).queue(function(next){
				$('.filters-menu').removeClass('closed').dequeue();
			});
		} else {

			$('.button-filters').addClass('closed');

			$('.filters-menu').addClass('closed').delay(200).queue(function(next){
				$('.filters-menu').addClass('hidden').dequeue();
			});
		}

	});

	lastWidth = $(window).width();
});

// reload de pagina zodra deze wordt geresized, want dan blijft de gallery qua hoogte goed!
$(window).resize(function(){
	if($(window).width()!=lastWidth){
		location.reload();
		lastWidth = $(window).width();
	}
});