(function($) {
		
	function search() {
		$('.search').on('click', function() {
			if ($('.topnav .searchform').is(':visible')) {
				$('.topnav .search div').removeClass('opened');
				$('.topnav .search div').addClass('closed');
				$('.topnav .searchform').hide();
				$('.menu-container').css('opacity', '1');
				$('.topnav .searchform input').focus();
			} else {
				$('.topnav .search div').removeClass('closed');
				$('.topnav .search div').addClass('opened');
				$('.menu-container').css('opacity', '0');
				$('.topnav .searchform').fadeIn();
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
			autoplaySpeed: 4000,
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
			autoplaySpeed: 4000,
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
			autoplaySpeed: 4000,
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

	function homepageHeroSlider() {		
		$('.home-slider').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			adaptiveHeight: true,
			prevArrow: $('.prev'),
			nextArrow: $('.next')		
		});
	}

	function projectMenuLinks() {		
		if ($('.project-menu').length > 0) {
			$('.project-menu select').on('change', function() {
				document.location.href = $(this).val();
			});
		}
	}

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

	function mobileNav() {
		$('.opennav').on('click', function() {
			$('.topnav').toggle();
		});
	}

	function mobileNav() {
		$('.opennav').on('click', function() {
			$('.topnav').toggle();
		});
	}

	function externalLinks() {
		$('a').each( function() {
			url = $(this).attr('href');
			if (url != null) {
				if (url.indexOf('http') !== -1) {
					if (url.indexOf(window.location.host) === -1) {
						if ($(this).attr('target') !== '_blank') {
							$(this).attr('target', '_blank');
						}
					}	
				}
			}
		});
	}

	signUpForm();

	$(document).ready(function() {
		collapsable_sections();
		search();
		eventsSlider();
		eventImages();
		resizeHeader();
		hideBrokenImages();
		projectSlider();
		removeEmptyPTags();
		select2init();
		homepageHeroSlider();
		mobileNav();
		externalLinks();
	});

	$(window).load(function() {
		projectMenuLinks();
	});

})(jQuery);