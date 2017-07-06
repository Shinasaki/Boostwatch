
$(window).bind("load", function() {

    // Static

        // Autoload.
            setTimeout(function(){ doorOpen() },500);


        // Animate when change page.
        $('a').click(function(event){
            if ($(this).attr('href') && !$(this).attr('target'))
            {
                event.preventDefault();
                var href = this.href;
                doorClose();
                setTimeout(function(){
                    window.location = href;
                },1500);
            }
        });

        // Dropdown.
        $('.dropdown').hover(function(){
            $(this).children('ul').stop().slideToggle(400);
        })
    // --/


    // Layout setting default.
    imgFit();
    divFull();
    getPrice();

    // Layout setting when resize.
    $(window).resize(function(){
        imgFit();
        divFull();
    });
    // --/


    // Boost

    // Process Price
    $('.currentRank, .newRank').on("keyup", function(){
        getPrice();
    });
    $('.currentRank, .newRank').on("change", function(){
        if($('.currentRank').val() == "")
        {
            $('.currentRank').val("1700")
            getPrice();
        }
        if($('.newRank').val() == "")
        {
            $('.currentRank').val("3000")
            getPrice();
        }

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
    $('.tag').on('keypress', function(){
        if (e.which == 13)
        {
            getRank('.tag','.server');
        }
    });

    // --/

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




});



// Function.
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
