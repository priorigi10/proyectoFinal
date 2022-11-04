setTimeout(function() {
    $('.banner-container').hide();
}, 5000)



var popUp = angular.module('popUp', [])
    .controller('mainCtrl', function($scope, $timeout) {

        $scope.openPopUp = function() {

            var buttonElement = document.querySelector('#pop-up-btn');
            var popUpElement = document.querySelector('#pop-up');

            popUpElement.style.width = buttonElement.offsetWidth + 'px';
            popUpElement.style.height = buttonElement.offsetHeight + 'px';
            popUpElement.style.top = buttonElement.getBoundingClientRect().top + 'px';
            popUpElement.style.left = buttonElement.getBoundingClientRect().left + 'px';
            popUpElement.style.display = "block";

            buttonElement.style.visibility = "hidden";

            $timeout(function() {
                angular.element(buttonElement).toggleClass('pop-up-open');
                angular.element(popUpElement).toggleClass('pop-up-open');
                angular.element(document.querySelector('#pop-up-bg')).toggleClass('pop-up-open');
            });

            $timeout(function() {
                popUpElement.querySelector('.content-wrap').style.opacity = 1;
            }, 300);
        }

        $scope.closePopUp = function() {
            var buttonElement = document.querySelector('#pop-up-btn');
            var popUpElement = document.querySelector('#pop-up');

            popUpElement.querySelector('.content-wrap').style.opacity = 0;

            popUpElement.style.visibility = "visible";
            popUpElement.style.padding = "0";

            angular.element(buttonElement).toggleClass('pop-up-open');
            angular.element(popUpElement).toggleClass('pop-up-open');
            angular.element(document.querySelector('#pop-up-bg')).toggleClass('pop-up-open');

            $timeout(function() {
                buttonElement.style.visibility = "visible";
                popUpElement.removeAttribute("style");
            }, 500);
        }

    })

/////////////////SLIDER///////////////


function nextSlide() {
    var active = $(".sliderItem.active"),
        activeIndex = $(active).index(),
        totalIndex = $(".sliderItem").length,
        next_item = 0

    if (activeIndex + 1 > totalIndex - 1) {
        next_item = 0
    } else {
        next_item = activeIndex + 1
    }

    $(active).removeClass("active")
    $(".sliderItem").eq(next_item).addClass("active");

    var activeNow = $(".sliderItem.active"),
        offsetContent = $(activeNow).parents(".content").offset().left,
        offsetActive = $(activeNow).offset().left,
        totalOffset = offsetActive - offsetContent

    $(activeNow).parents(".content").css({ "transform": "translate( -" + totalOffset + "px, 0px)" })
    $(activeNow).parents(".slider").find(".dot.active").removeClass("active");
    $(activeNow).parents(".slider").find(".dot").eq($(activeNow).index()).addClass("active");



}

function prevSlide() {
    var active = $(".sliderItem.active"),
        activeIndex = $(active).index(),
        totalIndex = $(".sliderItem").length,
        next_item = 0

    if (activeIndex - 1 < 0) {
        next_item = totalIndex - 1
    } else {
        next_item = activeIndex - 1
    }

    $(active).removeClass("active")
    $(".sliderItem").eq(next_item).addClass("active");

    var activeNow = $(".sliderItem.active"),
        offsetContent = $(activeNow).parents(".content").offset().left,
        offsetActive = $(activeNow).offset().left,
        totalOffset = offsetActive - offsetContent

    $(activeNow).parents(".content").css({ "transform": "translate( -" + totalOffset + "px, 0px)" })
    $(activeNow).parents(".slider").find(".dot.active").removeClass("active");
    $(activeNow).parents(".slider").find(".dot").eq($(activeNow).index()).addClass("active")


}

$(".slider").each(function() {
    var totalWidth = 0,
        $this = $(this)

    $(this).find(".content").children().each(function() {
        totalWidth += $(this).outerWidth();
    });

    var firstSlider = $(this).find(".content").find(".sliderItem").first();

    if (!$(firstSlider).hasClass("active")) {
        $(firstSlider).addClass("active");
    }

    $(this).find(".content").width(totalWidth);

    var totalSliderItems = $(this).find(".content").find(".sliderItem").length

    for (i = 0; i < totalSliderItems; i++) {
        $($this).find(".buttons").find(".pagination").append('<div class="dot"></div>')
    }

    var activeIndex = $($this).find(".content").find(".sliderItem.active").index()

    $($this).find(".dot").eq(activeIndex).addClass("active")

});

$(".nextButton").on('click', function(e) {
    e.preventDefault();
    nextSlide();
});

$(".prevButton").on('click', function(e) {
    e.preventDefault();
    prevSlide();
});

$(".dot").on('click', function() {
    var setEqIndex = $(this).index();

    $(this).parents(".slider").find(".content").find(".sliderItem.active").removeClass("active");
    $(this).parents(".slider").find(".content").find(".sliderItem").eq(setEqIndex).addClass("active");
    $(this).parents(".pagination").find(".dot.active").removeClass("active");
    Path2D
    $(this).addClass("active");

    var activeNow = $(this).parents(".slider").find(".content").find(".sliderItem").eq(setEqIndex),
        offsetContent = $(activeNow).parents(".content").offset().left,
        offsetActive = $(activeNow).offset().left,
        totalOffset = offsetActive - offsetContent

    $(activeNow).parents(".content").css({ "transform": "translate( -" + totalOffset + "px, 0px)" })

});