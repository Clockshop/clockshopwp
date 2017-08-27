(function($) {

	var projectwasdesktop = true;

	function isProjectMobile() {

		// console.log("a");

		if ( $(".projecttemplatecue").css("float") == "right" ) { 

			// console.log("b");

			return false;
		} else {

			// console.log("c");

			return true;
		}
	}


	function handleProjectResize() {

		// console.log("1");

		if ( isProjectMobile() ) {

			// console.log("2");

			if ( projectwasdesktop == true ) {

				// console.log("3");

				var element = $('.projectmenutoggle');

				element.removeClass('close');
				element.addClass('open');
				element.html('Menu');

				$('.projecttemplate .menuwrap').hide();

				projectwasdesktop = false;

			}


		} else {

			// console.log("4");

			if ( projectwasdesktop == false ) {

				// console.log("5");

				$('.projecttemplate .menuwrap').show();
				projectwasdesktop = true;

			}
		}

	}

	function toggleProjectNav() {
		
		var element = $('.projectmenutoggle');
		
		if ( element.hasClass('open') ) {

			element.removeClass('open');
			element.addClass('close');
			element.html('&nbsp;');

			$('.projecttemplate .menuwrap').stop().slideDown('fast');

		} else {

			$('.projecttemplate .menuwrap').stop().slideUp('fast', function() {
				element.removeClass('close');
				element.addClass('open');
				element.html('Menu');

			});

		}

	}

	$(document).ready( function() {

		$(".projectmenutoggle").addClass('open');

		$(".projectmenutoggle").on('click', function( event ) {
			toggleProjectNav();
		});

		handleProjectResize();

	});

	$(window).resize(function(){
		handleProjectResize();
	});

})(jQuery);
