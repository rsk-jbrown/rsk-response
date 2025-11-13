$(function() {
	const $masthead = $(".masthead");
	const $burger = $(".burger");
	const $mobileNav = $(".mobile-navigation");

	$burger.on("click", function(e) {
		e.stopPropagation();
		$(this).toggleClass("active");

		if ($(this).hasClass("active")) {
			$masthead.addClass("active");
			$mobileNav.addClass("active");
			$('.masthead__burger-text').text('Close');
			$("html, body").addClass("overflow-menu");
		} else {
			$masthead.removeClass("active");
			$mobileNav.removeClass("active");
			$('.masthead__burger-text').text('Menu');
			$("html, body").removeClass("overflow-menu");
		}
	});

	if($(window).scrollTop() > 2) {
		$masthead.addClass('scrolled');
	} else {
		$masthead.removeClass('scrolled');
	}

	$(window).on('scroll', (e) => {
		if($(e.currentTarget).scrollTop() > 100) {
			$masthead.addClass('scrolled');
		} else {
			$masthead.removeClass('scrolled');
		}

	});


	$('body').on('click', () => {
		$burger.removeClass('active');
		$masthead.removeClass('active');
		$mobileNav.removeClass('active');
		$mobileNav.find('.sub-menu').removeClass('active');
		$("html, body").removeClass("overflow-menu");
	});

	$mobileNav.on('click', (e) => {
		e.stopPropagation();
	});

	$mobileNav.find('.nav-item-arrow').on('click', (e) => {
		$(e.currentTarget).next().addClass('active');
	});

	$('.nav-back-link').on('click', (e) => {
		$(e.currentTarget).parent().removeClass('active');
	});

	$('.mobile-navigation__close').on('click', (e) => {
		$burger.removeClass('active');
		$masthead.removeClass('active');
		$mobileNav.removeClass('active');
		$mobileNav.find('.sub-menu').removeClass('active');
		$("html, body").removeClass("overflow-menu");
	});
});
