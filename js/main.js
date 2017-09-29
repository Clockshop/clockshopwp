(function($) {

	var topLinkVisible = false;
	var topNavVisible = false;
	var mobileNav = false;
	var scrollTimer = null;

	function isMobile() {
		if ( $(".responsivecue").css("float") == "right" ) { 
			return false;
		} else {
			return true;
		}
	}

	function openNav() {
		if ( topNavVisible == false ) {

			$('.opennav').hide();
			$('.closenav').show();

			$( ".topnav" ).show();
			topNavVisible = true;
		}

	}

	function closeNav() {

		if ( topNavVisible == true ) {

			$('.closenav').hide();
			$('.opennav').show();

			$( ".topnav" ).hide();
			topNavVisible = false;

		}

	}


	function handleScroll() {

		var scrolltop = $(window).scrollTop();

		if ( isMobile() ) {

			hideToplink();

		} else { 

			if ( scrolltop > 1000 ) {
				showToplink();
			} else {
				hideToplink();
			}
		}

	}



	function showToplink() {
		if ( topLinkVisible == false ) {
			topLinkVisible = true;
			$("#uparrow").stop().fadeIn("fast");
		}
	}

	function hideToplink() {
		if ( topLinkVisible == true ) {
			topLinkVisible = false;
			$("#uparrow").stop().fadeOut("fast");
		}
	}


	function setupLayout() {

		$('body').addClass('js');

		handleResize();

		$("#uparrow").hide();

	}

	function handleResize() {
		if ( isMobile() ) {
			if ( mobileNav == false ) {
				// Transition to mobile

				$('.topnav').hide();
				$('.closenav').hide();
				$('.opennav').show();

				topNavVisible = false;
				mobileNav = true;

			}

		} else {
			if ( mobileNav == true ) {
				//$('.topnav').show();
				mobileNav = false;
			}

		}

		setupPadding();
	}

	function setupPadding() {

		var adminbarheight = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
		}

		$('#uparrow').css('top', adminbarheight + 'px');
		$('.wpadminbarspacer').css({'height': adminbarheight + 'px'});


		var topTitle = 0;

		if ( isMobile() ) { 

			topTitle += $('.mobiletoggle').outerHeight();

		} else { 
			topTitle += $('.topnav').outerHeight();
		}

		$('.layoutspacer').css({'height': topTitle + 'px'});

	}

	$(document).ready( function() {

		setupLayout();

		$('#uparrow').on( "click", function(event) {
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0
			}, 200);
			return false;
		});

		$('.opennav').on('click', function( event ) {
			openNav();
		});

		$('.closenav').on('click', function( event ) {
			closeNav();
		});

	});


	$(window).load(function() {

		$('.flexslider').flexslider({            
		    controlNav: false,
		    directionNav: false
		});

	});


	$(window).scroll(function() {

	    if (scrollTimer) {
	        clearTimeout(scrollTimer);   // clear any previous pending timer
	    }
	    scrollTimer = setTimeout(handleScroll, 1);   // set new timer

	});

	$(window).resize(function(){
		handleResize();
	});

})(jQuery);
