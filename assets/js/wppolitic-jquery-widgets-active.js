(function($) {
    "use strict";

    /*------ Related  Movie ------*/
    $('.related-campaign-active').slick({
        slidesToShow: 3,
        arrows: true,
        dots: false,
        prevArrow: '<div class="btn-prev"><i class="fa fa-angle-left"></i></div>',
        nextArrow: '<div><i class="fa fa-angle-right"></i></div>',
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });




    /*--------------------------
    Countdown
    ---------------------------- */
    $('[data-countdown]').each(function() {

        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            
        var daystext = Wppolitic_localize_Data2.wppoliticlang_day;
        var hrstext = Wppolitic_localize_Data2.wppoliticlang_hrs;
        var minstext = Wppolitic_localize_Data2.wppoliticlang_min;
        var secstext = Wppolitic_localize_Data2.wppoliticlang_secs;


            $this.html(event.strftime('<div class="cdown days"><span class="counting">%-D</span>'+daystext+'</div><div class="cdown hours"><span class="counting">%-H</span>'+hrstext+'</div><div class="cdown minutes"><span class="counting">%M</span>'+minstext+'</div><div class="cdown seconds"><span class="counting">%S</span>'+secstext+'</div>'));
        });

    });

    /*------Counter Up ------*/
    $('.wppolitic-counter').counterUp({
        delay: 10,
        time: 1000
    });

    $('.wppolitic_popup-youtube,.wppolitic_popup_slider').magnificPopup({
        type: 'iframe'
    });

    /*-- 
        Timeline Process
    --------------------------------------------*/
    var timeLine = $('.wppolitic_timeline');
    var timeLineProces = $('.wppolitic_timeline-proces');
    timeLine.hover(
        function() {
            var timelinePosition = $(this).position().top;
            var timelineHeight = $(this).height();
            var totalHeight = timelinePosition + timelineHeight + 50;

            $(this).addClass('hover').prevAll().addClass('hover');
            timeLineProces.css('height', totalHeight + 'px');
        },
        function() {
            $(this).removeClass('hover').prevAll().removeClass('hover');
            timeLineProces.css('height', '0px');
        }
    )




})(jQuery);