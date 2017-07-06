
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
    $('.currentRank, .newRank').on("change", function(e){
        getPrice();
    });

        // Get sr by tag
        $('.tag').on('keypress', function(e){
            if(e.which === 13)
            {
                getRank('.tag','.server');
            }
        });
        $('.server').on('change', function(){
            getRank('.tag','.server');

        });
        $('.tag').on('change keypress', function(e){
            if(e.which == 13)
            {
                getRank('.tag','.server');
            }
            else
            {
                getRank('.tag','.server');
                getPrice();
                if($('.tag').val() == "")
                {
                    $('.currentRank').prop( "disabled", false );
                }
            }
        });
    // --/

    // Level
        $('.newLevel').on("change", function(){
            if($(this) != "")
            {
                levelCompile($(this).val());
            }
        })

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
