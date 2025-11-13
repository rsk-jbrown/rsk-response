$(window).on('load', function () {

	const resizeEvent = window.document.createEvent('UIEvents');
	resizeEvent.initUIEvent('resize', true, false, window, 0);
	window.dispatchEvent(resizeEvent);

	/**
	 * Sliders
	 */
	const sliders = (() => {

		const init = ($elem, options) => {

			if (!options) {
				options = {
					prevNextButtons: false,
					pageDots: false
				};
			}

			$elem.on('ready.flickity', () => {
				const resizeEvent = window.document.createEvent('UIEvents');
				resizeEvent.initUIEvent('resize', true, false, window, 0);
				window.dispatchEvent(resizeEvent);

				if (options.matchHeight) {
					$elem.find('.slide').matchHeight({
						byRow: false
					});
				}

				AOS.refresh();
			});

			$elem.flickity(options);


		};

		return {
			init: init
		};

	})();


	sliders.init($('.hero__slides'), {
		prevNextButtons: false,
		pageDots: false,
		wrapAround: true,
		autoPlay: 5000,
		matchHeight: true,
	});

	sliders.init($('.latest-posts__posts'), {
		prevNextButtons: false,
		pageDots: true,
		wrapAround: true,
		autoPlay: 5000,
		cellAlign: 'left',
	});

	sliders.init($('.logos__carousel--active'), {
		prevNextButtons: true,
		pageDots: false,
		wrapAround: true,
		autoPlay: 5000,
		cellAlign: 'left',
		arrowShape: {
			x0: 10,
			x1: 60, y1: 50,
			x2: 65, y2: 45,
			x3: 20
		}
	});

	sliders.init($('.team__carousel'), {
		prevNextButtons: true,
		pageDots: false,
		wrapAround: true,
		autoPlay: 5000,
		cellAlign: 'left',
		arrowShape: {
			x0: 10,
			x1: 60, y1: 50,
			x2: 65, y2: 45,
			x3: 20
		}
	});

	sliders.init($('.offices__carousel__slider'), {
		prevNextButtons: true,
		pageDots: false,
		wrapAround: false,
		autoPlay: 5000,
		freeScroll: true,
		wrapAround: true,
		cellAlign: 'left',
		arrowShape: {
			x0: 10,
			x1: 60, y1: 50,
			x2: 65, y2: 45,
			x3: 20
		}
	});

	sliders.init($('.features__carousel'), {
		prevNextButtons: true,
		pageDots: false,
		wrapAround: true,
		autoPlay: 5000,
		cellAlign: 'left',
		arrowShape: {
			x0: 10,
			x1: 60, y1: 50,
			x2: 65, y2: 45,
			x3: 20
		}
	});




	/**
	 * Live Search
	 */

	var searchTimeout;

	const liveSearch = (() => {

		const $searchInput = $('#searchInput');
		const $searchOverlay = $('.search-overlay');

		const openSearch = (e) => {
			$searchOverlay.addClass('active');
			$('.search-overlay input').focus();
			setTimeout(function () {
				$searchInput.focus()
			}, 500);
		};

		const closeSearch = (e) => {
			$searchOverlay.removeClass('active');
		};

		const getResults = (e) => {

			const data = {
				action: "live_search",
				s: $(e.currentTarget).val()
			};

			$.ajax({
				url: theme_params.ajaxurl, // AJAX handler
				data: data,
				method: "GET"
			})
				.done(function (response) {
					searchTimeout = setTimeout(function () {
						$(".search-overlay__live-search").addClass("active");
						$(".search-overlay__search-list").empty();
						$(".search-overlay__search-list").append(response);

						const regex = new RegExp($searchInput.val(), 'g');

						$(".search-overlay__live-search-text").each((index, elem) => {
							$(elem).html($(elem).html().replace(regex, "<strong>" + $searchInput.val() + "</strong>"));
						});

					}, 500);
				})
				.fail(function (err) {
					console.log(err);
				});

		};

		$searchInput.on('keyup', getResults);
		$('.search-trigger').on('click', openSearch);
		$('.search-close').on('click', closeSearch);

	})();

	/**
	 * Post Control
	 */
	const postControl = (() => {

		const $infGrid = $('.inf-grid');
		const $nextPosts = $('.next-posts-link');

		const loadNext = () => {
			$infGrid.infiniteScroll('loadNextPage');
		};

		const init = () => {
			if ($infGrid.length && $nextPosts.length) {

				$infGrid.infiniteScroll({
					path: ".next-posts-link a",
					append: ".inf-grid .inf-post",
					history: true,
					button: ".pagination__button",
					scrollThreshold: false,
					status: ".page-load-status"
				});

				$infGrid.on("append.infiniteScroll", (
					event,
					response,
					path,
					items
				) => {
					$(items).addClass("appended-item");
					AOS.refresh();
					window.dispatchEvent(resizeEvent);
					$infGrid.imagesLoaded(function () {
						$(items)
							.find("img")
							.each(function (index, img) {
								img.outerHTML = img.outerHTML;
							});
					});

					$('.mh-no-row').matchHeight({
						byRow: false
					});
				});
			}
		};

		return {
			init: init
		};

	})();

	postControl.init();

	function setCookie(name, value, days) {
		var expires = "";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "") + expires + "; path=/";
	}

	function getCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	function eraseCookie(name) {
		document.cookie = name + '=; Max-Age=-99999999;';
	}

	$('.cookie-banner__button.btn').on('click', function(e) {
		e.preventDefault();

		setCookie('kmg_policy', 'on', 365);

		$('.cookie-banner').fadeOut();
	});

	function stickyCats() {
		if($('.archive-sidebar').length) {

			if (window.matchMedia('(min-width: 1024px)').matches) {
				const $header = $('.masthead').outerHeight();
				const $distance = $('.archive-sidebar').offset().top;
				const $footerDistance = $('.mastfoot').offset().top;
				const $window = $(window);

				$window.scroll(function () {

					if ($window.scrollTop() < $distance - $header) {
						$('.archive-sidebar').removeClass('fixed');
					}

					if ($window.scrollTop() >= $footerDistance) {
						$('.archive-sidebar').removeClass('fixed');
					}

					if ($window.scrollTop() >= $distance) {
						$('.archive-sidebar').addClass('fixed');
					}

				});
			}
		}
	}
	//stickyCats();


	$(() => {

		AOS.init({
			duration: 1000,
			once: true
		});

	});
});


