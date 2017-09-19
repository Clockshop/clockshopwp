(function($) {

	$(document).ready(function() {
		
		function search() {
			$('.search').on('click', function() {
				if ($('.searchform').is(':visible')) {
					$('.searchform').hide();
					$('.menu-primary-navigation-container').css('opacity', '1');
					$('.search .fa-times').replaceWith( "<i class='fa fa-search' aria-hidden='true'></i>" );
					$('.searchform input').focus();
				} else {
					$('.menu-primary-navigation-container').css('opacity', '0');
					$('.searchform').fadeIn();
					$('.search .fa-search').replaceWith( "<i class='fa fa-times' aria-hidden='true'></i>" );
				}
			});
		}	

		function collapsable_sections() {
			$('.about-sections section .fa').on('click', function() {
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

		collapsable_sections();
		search();

	});

})(jQuery);
