/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

	__webpack_require__(1);
	__webpack_require__(2);
	__webpack_require__(3);

/***/ }),
/* 1 */
/***/ (function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */
/***/ (function(module, exports) {

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

			collapsable_sections();
			search();
			eventsSlider();
			eventImages();
			resizeHeader();
			hideBrokenImages();
			projectSlider();
			removeEmptyPTags();
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

/***/ }),
/* 3 */
/***/ (function(module, exports) {

	(function($) {

		var topLinkVisible = false;
		var topNavVisible = false;
		var mobileNav = false;
		var scrollTimer = null;

		function isMobile() {
			if ( $(".responsivecue").css("float") == "right" ) { 
				return false;
			} else {
				return true;
			}
		}

		function openNav() {
			if ( topNavVisible == false ) {

				$('.opennav').hide();
				$('.closenav').show();

				$( ".topnav" ).show();
				topNavVisible = true;
			}

		}

		function closeNav() {

			if ( topNavVisible == true ) {

				$('.closenav').hide();
				$('.opennav').show();

				$( ".topnav" ).hide();
				topNavVisible = false;

			}

		}


		function handleScroll() {

			var scrolltop = $(window).scrollTop();

			if ( isMobile() ) {

				hideToplink();

			} else { 

				if ( scrolltop > 1000 ) {
					showToplink();
				} else {
					hideToplink();
				}
			}

		}



		function showToplink() {
			if ( topLinkVisible == false ) {
				topLinkVisible = true;
				$("#uparrow").stop().fadeIn("fast");
			}
		}

		function hideToplink() {
			if ( topLinkVisible == true ) {
				topLinkVisible = false;
				$("#uparrow").stop().fadeOut("fast");
			}
		}


		function setupLayout() {

			$('body').addClass('js');

			handleResize();

			$("#uparrow").hide();

		}

		function handleResize() {
			if ( isMobile() ) {
				if ( mobileNav == false ) {
					// Transition to mobile

					$('.topnav').hide();
					$('.closenav').hide();
					$('.opennav').show();

					topNavVisible = false;
					mobileNav = true;

				}

			} else {
				if ( mobileNav == true ) {
					//$('.topnav').show();
					mobileNav = false;
				}

			}

			setupPadding();
		}

		function setupPadding() {

			var adminbarheight = 0;

			if ($('#wpadminbar').length != 0) {
				var adminbarheight = $('#wpadminbar').outerHeight();
			}

			$('#uparrow').css('top', adminbarheight + 'px');
			$('.wpadminbarspacer').css({'height': adminbarheight + 'px'});


			var topTitle = 0;

			if ( isMobile() ) { 

				topTitle += $('.mobiletoggle').outerHeight();

			} else { 
				topTitle += $('.topnav').outerHeight();
			}

			$('.layoutspacer').css({'height': topTitle + 'px'});

		}

		$(document).ready( function() {

			setupLayout();

			$('#uparrow').on( "click", function(event) {
				event.preventDefault();
				$('body,html').animate({
					scrollTop: 0
				}, 200);
				return false;
			});

			$('.opennav').on('click', function( event ) {
				openNav();
			});

			$('.closenav').on('click', function( event ) {
				closeNav();
			});

		});

		$(window).load(function() {

			$('.flexslider').flexslider({
			    controlNav: false,
			    directionNav: false
			});

			if ($('.project-menu').length > 0) {
				$('.project-menu select').on('change', function() {
					document.location.href = $(this).val();
				});
			}

		});


		$(window).scroll(function() {

		    if (scrollTimer) {
		        clearTimeout(scrollTimer);   // clear any previous pending timer
		    }
		    scrollTimer = setTimeout(handleScroll, 1);   // set new timer

		});

		$(window).resize(function(){
			handleResize();
		});

	})(jQuery);


/***/ })
/******/ ]);