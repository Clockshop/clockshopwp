(function($) {

	var projectwasdesktop = true;

	function isProjectMobile() {
		if ( $(".projecttemplatecue").css("float") == "right" ) { 
			return false;
		} else {
			return true;
		}
	}


	function handleProjectResize() {
		if ( isProjectMobile() ) {

			if ( projectwasdesktop == true ) {

				var element = $('.projectmenutoggle');

				element.removeClass('close');
				element.addClass('open');
				element.html('Menu');

				$('.projecttemplate .menuwrap').hide();

				projectwasdesktop = false;

			}


		} else {

			if ( projectwasdesktop == false ) {

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
