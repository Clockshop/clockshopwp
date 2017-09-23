(function($) {

	$(document).ready(function() {
		
		function search() {
			$('.search').on('click', function() {
				if ($('.topnav .searchform').is(':visible')) {
					$('.topnav .searchform').hide();
					$('.menu-container').css('opacity', '1');
					$('.search .fa-times').replaceWith( "<i class='fa fa-search' aria-hidden='true'></i>" );
					$('.topnav .searchform input').focus();
				} else {
					$('.menu-container').css('opacity', '0');
					$('.topnav .searchform').fadeIn();
					$('.search .fa-search').replaceWith( "<i class='fa fa-times' aria-hidden='true'></i>" );
				}
			});
		}	

		function collapsable_sections() {
			$('.collapsable-sections section .fa').on('click', function() {
				if ($(this).hasClass('fa-plus')) {
					$(this).removeClass('fa-plus');
					$(this).addClass('fa-minus');
				} else {
					$(this).removeClass('fa-minus');
					$(this).addClass('fa-plus');
				}
				$(this).next().toggle('normal');
			});
		}

		function eventsSlider() {
			$('.events-slider').flickity({
				cellSelector: '.slide-cell',
				cellAlign: 'left',
				wrapAround: true,
				pageDots: false,
				prevNextButtons: false,
				autoPlay: 3500,
				pauseAutoPlayOnHover: false
			});

			$('.prev').on( 'click', function() {
				$('.events-slider').flickity('previous');
			});

			$('.next').on( 'click', function() {
				$('.events-slider').flickity('next');
			});
		}

		collapsable_sections();
		search();
		eventsSlider();

	});

})(jQuery);
