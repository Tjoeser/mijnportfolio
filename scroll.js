$(window).scroll(function(e) {
    var $els = $('.githublinks');
    var scrollTop = $(this).scrollTop();
    var isStickySet = false;

    $els.each(function () {
        var $el = $(this);
        var elTop = $el.offset().top;
        var stickyNumber = $el.data('sticky');

        if (scrollTop > elTop && !isStickySet) {
            $el.css('position', 'fixed');
            $el.css('top', '0');
            isStickySet = true;
            // console.log(stickyNumber);
        } else {
            $el.css('position', 'static');
        }
    });
});
