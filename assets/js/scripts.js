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
					$(this).next().show();
				} else {
					$(this).removeClass('fa-minus');
					$(this).addClass('fa-plus');
					$(this).next().hide();
				}
			});
		}

		function eventsSlider() {
			$('.events-slider').slick({
				arrows: false,
				adaptiveHeight: true,
				autoplay: true,
				autoplaySpeed: 10000,
			});

			$('.prev').on( 'click', function() {
				$('.events-slider').slick('slickPrev');
			});

			$('.next').on( 'click', function() {
				$('.events-slider').slick('slickNext');
			});
		}

		function eventImages() {
			$('.event-images').slick({
				arrows: false,
				adaptiveHeight: true,
				autoplay: true,
				autoplaySpeed: 10000,
			});

			$('.prev').on( 'click', function() {
				$('.event-images').slick('slickPrev');
			});

			$('.next').on( 'click', function() {
				$('.event-images').slick('slickNext');
			});
		}

		function resizeHeader() {
			$(window).scroll(function(){
				if ($(document).scrollTop() > 0) {
					if ($('.primarynav').hasClass('top')) $('.primarynav').removeClass('top');
					if ($('.layoutspacer').hasClass('top')) $('.layoutspacer').removeClass('top');
					$('.primarynav').addClass('scroll');
					$('.layoutspacer').addClass('scroll');
				} else {
					if ($('.primarynav').hasClass('scroll')) $('.primarynav').removeClass('scroll');
					if ($('.layoutspacer').hasClass('scroll')) $('.layoutspacer').removeClass('scroll');
					$('.primarynav').addClass('top');
					$('.layoutspacer').addClass('top');
				}
			});
		}

		function hideBrokenImages() {
			$(".search-template article img").load(function() { 
			    $(this).css('opacity', '1');
			});
		}

		function projectSlider() {
			$('.project-slider').slick({
				autoplay: true,
				autoplaySpeed: 7500,
				adaptiveHeight: true,
			});
		}

		function removeEmptyPTags() {
			$('p:empty').remove();
		}

		function select2init() {
			$('.project-select').select2({
				width: '100%',
				minimumResultsForSearch: -1
			});
		}

		collapsable_sections();
		search();
		eventsSlider();
		eventImages();
		resizeHeader();
		hideBrokenImages();
		projectSlider();
		removeEmptyPTags();
		select2init();
	});

	$(window).load(function() {
		//
	});

	function signUpForm() {
	    $(document).bind('gform_post_render', function(event, formId, currentPage){
	    	if(formId == 4) {
	    		$('#input_4_1').attr("placeholder", "Your Email Address...");
				$(".gform_validation_error .ginput_container_email input").addClass('error');
				$(".gform_validation_error .ginput_container_email input").keydown(function() {
					$(this).removeClass('error');
				});
	    	}
	    });
	}

	signUpForm();

})(jQuery);