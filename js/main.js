(function($) {

	var toplinkVisible = false;

	function showToplink() {
		if ( toplinkVisible == false ) {
			toplinkVisible = true;
			$("#uparrow").stop().fadeIn("fast");
		}
	}

	function hideToplink() {
		if ( toplinkVisible == true ) {
			toplinkVisible = false;
			$("#uparrow").stop().fadeOut("fast");
		}
	}


	function setupLayout() {

		$('body').addClass('js');

		var adminbarheight = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('#uparrow').css('top', adminbarheight + 'px');
			$('.wpadminbarspacer').css({'height': adminbarheight + 'px'});
		}

		var topTitle = $('.topnav').outerHeight();
		$('.layoutspacer').css({'height': topTitle + 'px'});

		$("#uparrow").hide();


	}

	$(document).ready( function() {

		setupLayout();

		$('#uparrow').on( "click", function(event) {
			console.log('hi');
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0
			}, 200);
			return false;
		});


	});


	$(window).load(function() {

		$('.flexslider').flexslider({            
		    controlNav: false,
		    directionNav: false
		});

	});


	$(window).scroll(function() {

		var scrolltop = $(window).scrollTop();

		if ( scrolltop > 1000 ) {
			showToplink();
		} else {
			hideToplink();
		}

	});

})(jQuery);
