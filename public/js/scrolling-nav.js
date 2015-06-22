//jQuery to collapse the navbar on scroll
jQuery(document).ready(function($) {

    //jQuery for page scrolling feature - requires jQuery Easing plugin
    $(function() {
        $('a.page-scroll').bind('click', function(event) {
            if ($(this).attr('data-target-value') == '#project') {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top - 150
                }, 750, 'easeInOutExpo');
                event.preventDefault();
            }else{
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top - 100
                }, 750, 'easeInOutExpo');
                event.preventDefault();
            }
        });
    });
});
