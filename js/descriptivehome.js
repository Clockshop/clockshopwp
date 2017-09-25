// JSA Home

(function($) {

	function homeIsMobile() {
		if ( $(".homecue").css("float") == "right" ) { 
			return false;
		} else {
			return true;
		}
	}

	function setHomeHeights() {

		if ( homeIsMobile() ) { 

			$('.carousel-main .slide').css({'height': 'auto'});

		} else {

			var windowheight = window.innerHeight;
		
			var wpadminbar = 0; 
			if ($('#wpadminbar').length != 0) {
				wpadminbar = $('#wpadminbar').outerHeight();
			}

			var layoutspacer = 0; 
			if ($('.layoutspacer').is(':visible')) {
				layoutspacer = $('.layoutspacer').outerHeight();
			}

			var carouselheight = windowheight - wpadminbar - layoutspacer;
	
			$('.carousel-main .slide').css({'height': carouselheight + 'px'});

		}

	}


	$(document).ready( function() {

		setHomeHeights();

		$('.carousel-main').flickity({
			cellSelector: '.carousel-cell',
			cellAlign: 'left',
			wrapAround: true,
			// imagesLoaded: true,
			pageDots: false,
			prevNextButtons: false,
			autoPlay: 3500,
			// watchCSS: true,
			pauseAutoPlayOnHover: false
		});

		$('.prev').on( 'click', function() {
			$('.carousel-main').flickity('previous');
		});

		$('.next').on( 'click', function() {
			$('.carousel-main').flickity('next');
		});

	});

	$(window).load(function(){
		setHomeHeights();
	});

	$(window).resize(function(){
		setHomeHeights();
	});


	$(function() {

	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {

			var wpadminbar = 0;

			if ($('#wpadminbar').length != 0) {
				wpadminbar =+ $('#wpadminbar').outerHeight();
			}

			var targetoffset = target.offset().top - wpadminbar;

	        $('html,body').animate({
	          scrollTop: targetoffset
	        }, 250);
	        return false;
	      }
	    }
	  });

	});


})(jQuery);