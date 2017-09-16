(function($) {

	$(document).ready(function() {
		
		function search() {
			$('.search').on('click', function() {
				if ($('#searchform').is(':visible')) {
					$('#searchform').hide();
					$('.menu-primary-navigation-container').css('opacity', '1');
					$('.search .fa-times').replaceWith( "<i class='fa fa-search' aria-hidden='true'></i>" );
				} else {
					$('.menu-primary-navigation-container').css('opacity', '0');
					$('#searchform').fadeIn();
					$('.search .fa-search').replaceWith( "<i class='fa fa-times' aria-hidden='true'></i>" );
				}
			});
		}
	
		search();

	});

})(jQuery);
