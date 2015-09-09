(function($) {

	$(document).ready( function() {

		$('#alltoggle').on( "click", function(event) {
			if ( $(this).hasClass('off') ) {

				$('.projectstoggle li').addClass('off');
				$('#alltoggle').removeClass('off');

				$('.commissions').show();
				$('.series').show();

			}

		});

		$('#commissionstoggle').on( "click", function(event) {
			if ( $(this).hasClass('off') ) {

				$('.projectstoggle li').addClass('off');
				$('#commissionstoggle').removeClass('off');

				$('.series').hide();
				$('.commissions').show();

			}

		});

		$('#seriestoggle').on( "click", function(event) {
			if ( $(this).hasClass('off') ) {

				$('.projectstoggle li').addClass('off');
				$('#seriestoggle').removeClass('off');

				$('.commissions').hide();
				$('.series').show();

			}

		});

	});

})(jQuery);