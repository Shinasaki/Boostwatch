function getPrice()
{
    var currentRank = parseInt($('.currentRank').val());
    var newRank = $('.newRank').val();

    // Limit Range
    if($.isNumeric(currentRank) && currentRank !== "")
    {
        $('.price').prop("disabled", false);
        $('.price').addClass('enabled');
        $('.price').removeClass('disabled');
        if(currentRank >= newRank)
        {
            if (currentRank > 4500)
            {
                currentRank = 4400;
                newRank = 4500;
                $('.currentRank').val("4400");
                $('.newRank').val("4500");
            }
            else
            {
                if(newRank <= 4500)
                {
                    newRank = Math.round((currentRank + 100) / 100) * 100;
                    $('.newRank').val(newRank);
                }
            }
        }
        else
        {
            if(newRank > 4500)
            {
                newRank = 4500;
                $('.newRank').val(newRank);
            }
        }
        getPriceTh(currentRank,newRank);


        // Switch [Off On] Submit
        if(currentRank >= 0 && newRank != "" && $('.tag').val() != "" && $('.server').val() != "" && $('.bnet_email').val() != "" && $('.bnet_pass').val() != "")
        {
            $('.checkout').prop("disabled", false);
            $('.checkout').css("opacity", "1");
        }
        else
        {
            $('.checkout').prop("disabled", true);
            $('.checkout').css("opacity", "0.7");
        }
    }
}

// Show Image
function rankImg(elem,rank)
{
    var elem = elem + " img";
    if(rank <= 1499)
    {
        $(elem).attr("src","../image/rank/1.png");
    }
    else if (rank <= 1999)
    {
        $(elem).attr("src","../image/rank/2.png");
    }
    else if (rank <= 2499)
    {
        $(elem).attr("src","../image/rank/3.png");
    }
    else if (rank <= 2999)
    {
        $(elem).attr("src","../image/rank/4.png");
    }
    else if (rank <= 3499)
    {
        $(elem).attr("src","../image/rank/5.png");
    }
    else if (rank <= 3999)
    {
        $(elem).attr("src","../image/rank/6.png");
    }
    else if (rank >= 4000)
    {
        $(elem).attr("src","../image/rank/7.png");
    }
}

// Get Price
function getPriceTh(currentRank,newRank)
{
    rankImg('.boost-img1', currentRank);
    rankImg('.boost-img2', newRank);
    compileRank(currentRank, newRank);
}


function getRank(elem,region) //.boost .solo
{
    tag = $(elem).val();
    region = $(region).val();

    if(!$.isNumeric(tag) && tag !== "")
    {
        data = 'tag='+tag+"&region="+region;
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            url: '/ajax/getRank',
            data: data,
            type: 'POST',
            beforeSend: boostSend,
            complete: boostComplete,
            timeout: '7000',
            success: rankSuccess,
            error: rankError,
        });
    }
}
    function rankSuccess(result)
    {
        result = result.replace(/\s+/g, '');
        if(result.length > 1)
        {
            $('.currentRank').val(result);
            $('.currentRank').prop( "disabled", true );

            if($('.currentRank').val() >= $('.newRank').val())
            {
                newrank = parseInt($('#tag').val());
                newRank = Math.round((newrank + 100) / 100) * 100
                $('.newRank').val(newRank);
            }
        }
        else
        {
            $('.currentRank').val(0);
            $('.currentRank').prop( "disabled", false );
        }
        getPrice()
    }

    function rankError(xhr, status, error)
    {
        $('.tag').append("Timeout");
    }
    function boostSend()
    {
        $('#tag-load i').css('display','inline-block');
        $('input, select').prop( "disabled", true );
    }

    function boostComplete()
    {
        $('#tag-load i').css('display','none');
        $('input, select').prop( "disabled", false );
        getPrice();
    }

/* Rank Compile */
function compileRank(currentRank, newRank)
{
    if($.isNumeric(currentRank) && $.isNumeric(currentRank))
    {
        data = 'currentRank='+currentRank+"&newRank="+newRank
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            url: '/ajax/compileRank',
            data: data,
            type: 'POST',
            timeout: '7000',
            success: compileSuccess,
            error: compileError,
        });
    }
}
    function compileSuccess(result)
    {
        $('.price').text(result);
    }

    function compileError(xhr, status, error)
    {
        $('.tag').append("Timeout");
    }

/* Level Compile */
function levelCompile(level)
{
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            url: '/ajax/levelCompile',
            data: "level="+level,
            type: 'POST',
            timeout: '7000',
            success: levelSuccess,
            error: levelError,
        });
}
    function levelSuccess(result)
    {
        $('.price').text(result);
    }
    function levelError(xhr, status, error)
    {
        $('.tag').append("Timeout");
    }
