(function($) {

	$(document).ready( function() {

		$('#commissionstoggle').on( "click", function(event) {
			if ( $('#commissionstoggle').hasClass('off') ) {

				$('#commissionstoggle').removeClass('off');
				$('.commissions').show();

			} else {

				$('#commissionstoggle').addClass('off');
				$('.commissions').hide();

				if ( $('#seriestoggle').hasClass('off') ) {
					$('#seriestoggle').removeClass('off');
					$('.series').show();
				}

			}

			$(this).addClass('hovering');

		});

		$('#seriestoggle').on( "click", function(event) {
			if ( $('#seriestoggle').hasClass('off') ) {

				$('#seriestoggle').removeClass('off');
				$('.series').show();

			} else {

				$('#seriestoggle').addClass('off');
				$('.series').hide();

				if ( $('#commissionstoggle').hasClass('off') ) {
					$('#commissionstoggle').removeClass('off');
					$('.commissions').show();
				}

			}

			$(this).addClass('hovering');

		});

		$('.projectstoggle li').on( "mouseleave", function(event) {
			$(this).removeClass('hovering');
		});


	});

})(jQuery);