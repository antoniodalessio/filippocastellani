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

function isMobile() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		return true
	}
	return false
}

$(window).on("load", function(){
	$('.page').addClass('loaded')
})

$(document).ready( () => {

	var imgLength = $(".thumb img").length;
	var tmpLength = 0;
	
	var $pageContainer = $('.page__container');

	var $buttons = $pageContainer.find(".buttons__overlay .thumb")

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
			autoplaySpeed: element.speed,
		})

		$(element.name).data("duration", element.speed)
	})
	
	$buttons.on('mouseover', function() {
		var index = $(this).index()
		var $associateThumb = $pageContainer.find('> .thumb').eq(index);
		$associateThumb.slick('slickPlay')
		//$associateThumb.slick('slickNext')
		$associateThumb.css({"z-index": 11, opacity: 1}).addClass('hover')
	})

	$buttons.on('mouseleave', function() {
		var index = $(this).index()
		var $associateThumb = $pageContainer.find('> .thumb').eq(index);
		$associateThumb.animate({'opacity': 0.5}).css("z-index", 1).removeClass('hover')
		$associateThumb.slick('slickPause')
		$associateThumb.slick('slickGoTo', 0)
	})

	if (isMobile()) {
        detectIsInViewport('_0')
		detectIsInViewport('_1')
		detectIsInViewport('_2')
	}

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

});


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
