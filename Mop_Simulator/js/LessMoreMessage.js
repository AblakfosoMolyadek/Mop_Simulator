console.log('LessMoreMessage.js loaded.');

$(function() {

    // <a class="truncate"> TEXT DATA HERE </a>
    var showChar = 200;
    var ellipsestext = "...";


    $(".truncate").each(function() {
    var content = $(this).html();
    if (content.length > showChar) {
        var c = content.substr(0, showChar);
        var h = content;
        var html =
        '<div class="truncate-text" style="display:block">' +
        c +
        '<span class="moreellipses">' +
        ellipsestext +
        '&nbsp;&nbsp;<a href="" class="moreless more">more</a></span></span></div><div class="truncate-text" style="display:none">' +
        h +
        '<a href="" class="moreless less">Less</a></span></div>';

        $(this).html(html);
    }
    });

    $(".moreless").click(function() {
    var thisEl = $(this);
    var cT = thisEl.closest(".truncate-text");
    var tX = ".truncate-text";

    if (thisEl.hasClass("less")) {
        cT.prev(tX).toggle();
        cT.slideToggle();
    } else {
        cT.toggle();
        cT.next(tX).fadeToggle();
    }
    return false;
    });
    /* end iffe */
})();
