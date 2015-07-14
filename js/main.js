(function($) {

	$(document).ready( function() {

		$('ul#grid a, #uparrow').click(function(event) {
			event.preventDefault();
			var $link = $(this);
			$('html,body').animate({scrollTop: $($link.attr('href')).offset().top + 5},'slow');
		})

		$('#archive #container').waypoint(function() {
			$('#uparrow').show();
		});

		$('#archive nav').waypoint(function() {
			$('#uparrow').hide(); 
		});

		$('#infopage #container').waypoint(function() {
			$('#uparrow').show();
		});

		$('#infopage nav').waypoint(function() {
			$('#uparrow').hide(); 
		});

	});
	
	$(window).load(function() {
		$('.flexslider').flexslider();
	});

})(jQuery);
