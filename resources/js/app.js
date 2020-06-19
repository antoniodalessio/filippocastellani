require('./bootstrap');
require('slick-carousel')
require('jquery')


$.fn.isInViewport = function() {
	var elementTop = $(this).offset().top;
	var elementBottom = elementTop + $(this).outerHeight();
	var viewportTop = $(window).scrollTop();
	var viewportBottom = viewportTop + $(window).height();
	return elementBottom > viewportTop && elementTop < viewportBottom;
};

const tablet = 1024;
const mobile = 768;

function isMobile() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		return true
	}
	return false
}

function isTablet() {
	if ( /(ipad|tablet|(android(?!.*mobile))|(windows(?!.*phone)(.*touch))|kindle|playbook|silk|(puffin(?!.*(IP|AP|WP))))/.test(navigator.userAgent.toLowerCase())) {
		return true
	}
	return false
}



$(window).on("load", function(){
	$('.site-loader').hide()
	$('.page').addClass('loaded')
})

$(document).ready( () => {

	var imgLength = $(".thumb img").length;
	var tmpLength = 0;

	var elements = [
		{ name: '.thumb_0', speed: animationTime_0 },
		{ name: '.thumb_1', speed: animationTime_1 }, 
		{ name: '.thumb_2', speed: animationTime_2}
	]

	elements.forEach(function(element) {
		$(element.name).slick({
			slidesToShow: 1,
			infinite: true,
			speed: 500,
			fade: true,
			cssEase: 'linear',
			prevArrow: false,
			nextArrow: false,
			swipeToSlide: true,
			autoplaySpeed: element.speed,
		})

		$(element.name).data("duration", element.speed)
	})
	
	linkDesktopEvents()
	linkArrowsEvents()
	
	if (isMobile()) {
        linkMobileEvents()
	}
	
	// al ridimensionamento elimina gli eventi del desktop. Da inserire se richiesto
	$(window).on('resize', function() {
		if ($(window).width() < tablet) {
			removeDesktopEvent()
			linkMobileEvents()
		}else{
			linkDesktopEvents()
			removeMobileEvents()
		}
	})
});

function linkMobileEvents() {
	detectIsInViewport('_0')
	detectIsInViewport('_1')
	detectIsInViewport('_2')
}

function removeMobileEvents() {
	var $pageContainer = $('.page__container');
	$pageContainer.find('> .thumb').each(function() {
		$(this).slick('slickPause')
		$(this).slick('slickGoTo', 0)
		$(this).removeClass('progress')
		$(this).css({'opacity': 0.5, "z-index": 1}).removeClass('hover')
	})

}

function linkArrowsEvents() {
	$('.arrow-up').on('click', function() {
		$("html, body").animate({ 
            scrollTop: 0 
        }, "slow");
        return false;
	})

	$('.arrow-down').on('click', function() {
		$("html, body").animate({ 
            scrollTop: $(document).height()
        }, "slow");
        return false;
	})
}

function linkDesktopEvents() {
	
	if (!isTablet() && !isMobile()) {

		var $pageContainer = $('.page__container');
		var $buttons = $pageContainer.find(".buttons__overlay .thumb")

		$buttons.unbind('mouseover');
		$buttons.unbind('mouseleave');

		
		$buttons.on('mouseover', function() {
			var index = $(this).index()
			var $associateThumb = $pageContainer.find('> .thumb').eq(index);
			$associateThumb.slick('slickPlay')
			$associateThumb.addClass('progress')
			$associateThumb.css({"z-index": 11, opacity: 1}).addClass('hover')

			// $associateThumb.on('afterChange', function(event, slick, currentSlide) {
			// 	if (currentSlide == 0) {
			// 		$associateThumb.removeClass('no-transition')
			// 		$associateThumb.addClass('progress')
			// 	}
			// })

			// $associateThumb.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
			// 	if (nextSlide == 0) {
			// 		$associateThumb.removeClass('progress')
			// 		$associateThumb.addClass('no-transition')
			// 	}
			// })

		})

		$buttons.on('mouseleave', function() {
			var index = $(this).index()
			var $associateThumb = $pageContainer.find('> .thumb').eq(index);
			$associateThumb.css({'opacity': 0.5, "z-index": 1}).removeClass('hover')
			$associateThumb.removeClass('progress')
			$associateThumb.slick('slickPause')
			$associateThumb.slick('slickGoTo', 0)
		})
	}
}

function removeDesktopEvent() {
	var $pageContainer = $('.page__container');
	var $buttons = $pageContainer.find(".buttons__overlay .thumb")
	$buttons.off('mouseover');
	$pageContainer.find('> .thumb').css({opacity: 1, "z-index": 1 }).removeClass('hover')
	$buttons.off('mouseleave');
}


function detectIsInViewport(elem) {
    
    if ($('.thumb' + elem).isInViewport()) {
        $('.thumb' + elem).slick('slickPlay')
        $(window).off('scroll.'+ elem)
    }

	$(window).on('scroll.' + elem, function() {
		if ($('.thumb' + elem).isInViewport()) {
			$('.thumb' + elem).slick('slickPlay')
			$(window).off('scroll.'+ elem)
		}
	})
}
