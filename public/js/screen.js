function divFull()
{
    var height = $(window).height() - $('.nav li').height();
    $('.divFull').css({
        'min-height' : height,
    });
}


function imgFit()
{
    var height = $(window).height();
    var width = $(window).width();
    var imgWidth = (height / 2);

    $('.imgFit a').children().css({
        width : imgWidth,
        position : 'absolute',
        'left' : (width / 2) - (imgWidth / 2),
        'top' : (height / 2) - (imgWidth / 2) - 25,
    });
}

/*function imgCenter()
{
    var imgWidth = $('.imgCenter').width();
    var imgHeight = $('.imgCenter').height();
    var height = $(window).height();
    var width = $(window).width();

    $('.imgCenter ').css({
        position : 'relative',
        top : (height / 2) - (imgHeight / 2) + $('.nav').height(),
        left : (width / 2) - (imgWidth / 2) - 100,
    });
}*/
