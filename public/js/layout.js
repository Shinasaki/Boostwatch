
$(window).bind("load", function() {

    // Static

        // Autoload.


            // loading Page
            setTimeout(function(){ doorOpen() },500);


            // Default
                imgFit();
                divFull();
                getPrice();
            // Resize
            $(window).resize(function(){
                imgFit();
                divFull();
            });


        // Chat Autoload
        if (window.location.pathname.indexOf('dashboard') > -1) {
            chatMsg();
            set_height('.dashboard .left, div #right');
            progress_bar();

            window.setInterval(function(){
                var maxScrollTop = $(".chat-msg")[0].scrollHeight - $(".chat-msg").outerHeight();
                var minScrollTop = $('.chat-msg').scrollTop();

                if (maxScrollTop - minScrollTop < 200) {
                    chatMsg();
                }
            }, 5000);
            $(window).resize(function(){
                chatMsg();
                set_height('.dashboard .left, div #right');
                progress_bar();
            });
        }




        // Animate when change page.
        $('a').click(function(event){
            if ($(this).attr('href') && !$(this).attr('target'))
            {
                event.preventDefault();
                var href = this.href;
                doorClose();
                popup_close();
                setTimeout(function(){
                    window.location = href;
                },1500);
            }
        });
        $('form').submit(function(){
            form = this;
            event.preventDefault();
            doorClose();
            popup_close();
            setTimeout( function () {
                form.submit();
            }, 1500);
        });


        // Dropdown.
        $('.dropdown').hover(function(){
            $(this).children('ul').stop().slideToggle(400);
        })
    // --/


    // Process Price
    $('.currentRank').on("keyup", function(){
        getPrice();
    });
    $('.currentRank, .newRank').on("change", function(){
        if($('.currentRank').val() == "")
        {
            $('.currentRank').val("1700")
        }
        if($('.newRank').val() == "")
        {
            $('.currentRank').val("3000")
        }
        getPrice();
    });


    // Get sr by tag
    $('.server').on('change', function(){
        getRank('.tag','.server');
    });
    $('.tag').on('change', function(){
        if ($('.tag').val() == "") {
            $('.currentRank').prop( "disabled", false );
            $('.currentRank').val("0");
            getPrice()
        }
        getRank('.tag','.server');
    });
    $('.tag').on('keypress', function(e){
        if (e.which == 13 && $('.tag').focus())
        {
            event.preventDefault();
            getRank('.tag','.server');
        }
    });
    // --/


    $('.bnet_email, .bnet_pass').on('keypress', function() {
        if ($('.bnet_email').val() != "" && $('.bnet_pass').val() != "")
        {
            $('.checkout').prop("disabled", false);
            $('.checkout').css("opacity", "1");
        }
        else
        {
            $('.checkout').prop("disabled", true);
            $('.checkout').css("opacity", "0.7");
        }
    });


    // Level
    $('.newLevel').on("keyup", function(){
        var level = $(this).val();
        if($.isNumeric(level) && level != "")
        {
            if(level <= 0)
            {
                $(this).val('10');
            }
            else if (level > 1000) {
                $(this).val('1000');
            }
            else
            {
                levelCompile($(this).val());
            }
        }
    });

    $('.newLevel').on("change", function(){
        if ($(this).val() == "")
        {
            $(this).val('10');
        }
    });
    // --/


    // Popup
        $('.popup').click(function(e){
            if (e.target == this){
                popup_close();
            }
        });

        $('.popup-title i').click(function(){
            popup_close();
        });


        if ($.urlParam('alert') == "login") {
            popup_open("Permission Denied","Please Login","Login","yes","/login");
            setTimeout(function(){ popup_close() },4000);
        }
        else if ($.urlParam('alert') == "member") {
            popup_open("Permission Denied","Your are not Member");
            setTimeout(function(){ popup_close() },4000);
        }
        else if ($.urlParam('alert') == "staff") {
            popup_open("Permission Denied","Your are not Staff");
            setTimeout(function(){ popup_close() },4000);
        }
        else if ($.urlParam('alert') == "admin") {
            popup_open("Permission Denied","Your are not Admin");
            setTimeout(function(){ popup_close() },4000);
        }
        else if ($.urlParam('alert') !== null) {
            popup_open("Alert", $.urlParam('alert'));
            setTimeout(function(){ popup_close() },4000);
        }
    // - /



    // Chat
    $('.msg').on('keypress', function(e){
        if (e.which == 13 && $('.msg').focus())
        {
            chat($('.msg').val());
            $(this).val('');
        }
    });
    $('.msg_submit').on('click', function(){
        chat($('.msg').val());
        $('.msg').val('');
    });
    // - /


});



// Function.

$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
        return null;
    }
    else{
        return decodeURI(results[1]) || 0;
    }

}

function doorOpen()
{
    $('.door-left').animate(
        {
            left: '-50%',
        },
        {
            duration: 400
        }
    );
    $('.door-right').animate(
        {
            right: '-50%',
        },
        {
            duration: 400
        }
    );
    $('.door-icon, .door-loading').animate(
        {
            width: '200px',
            height: '200px',
            opacity: '0',
        },
        {
            easing: "linear", duration:550
        }
    )
    setTimeout(function(){ $('.door-icon').css('display','none') },550);
    setTimeout(function(){ $('.door-loading').css('display','none') },550);

    $('.container').animate(
        {
            opacity: '1'
        },
        {
            easing: "linear", duration:550
        }
    )
    //$('.nav').slideDown(600);
}

function doorClose()
{
    $('.door-left').animate(
        {
            left: '0%',
        },
        {
            duration:400,
        }
    );
    $('.door-right').animate(
        {
            right: '0%',
        },
        {
            duration:400,
        }
    );
    $('.door-icon, .door-loading').animate(
        {
            width: '300px',
            height: '300px',
            opacity: '1',
        },
        {
            easing: "linear", duration:550
        }
    )
    $('.door-icon').css('display','block');
    $('.door-loading').css('display','block');
    $('.container').animate(
        {
            opacity: '0'
        },
        {
            easing: "linear", duration:550
        }
    )
    //$('.nav').slideUp(600);
}

function popup_open(title,content,footer = "", button = "", href="")
{
    $('.popup').fadeIn('toggle');
    $('.popup-title span').text(title);
    $('.popup-content').text(content);
    if (footer !="" && button != "" && href != "")
    {
        $('.popup-footer a').css('display', 'block');
        $('.popup-footer a').text(footer);
        $('.popup-footer a').attr('href', href);
    }

}

function popup_close()
{
    $('.popup').fadeOut('toggle');
    $('.popup-footer #button').css('display', 'none');
    window.history.replaceState(null, null, window.location.pathname);
}
