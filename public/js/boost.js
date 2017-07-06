function getPrice()
{
    var currentRank = parseInt($('.currentRank').val()) + 100;
    var newRank = $('.newRank').val();

    // Fill Empty
    if($('.currentRank').val() == "" || $('#tag').val() < 0)
    {
        $('.currentRank').val("2700");

        if(newRank < currentRank)
        {
            $('.currentRank').val("2800");
        }
    }


    // Limit Range
    if($.isNumeric(currentRank) && currentRank !== "")
    {
        $('.price').prop("disabled", false);
        $('.price').addClass('enabled');
        $('.price').removeClass('disabled');
        if(currentRank - 100 >= newRank)
        {
            if (currentRank - 100 > 4500)
            {
                currentRank = 4400 + 100;
                newRank = 4500;
                $('.currentRank').val("4400");
                $('.newRank').val("4500");
            }
            else
            {
                if(newRank <= 4500)
                {
                    newRank = Math.round(currentRank / 100) * 100;
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
        //alert("current "+ currentRank + "new " + newRank);
        getPriceTh(currentRank,newRank);
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
        var err = eval("(" + xhr.responseText + ")");
        $('.tag').append(err);
    }
    function boostSend()
    {
        $('#tag-load i').css('display','inline-block');
    }

    function boostComplete()
    {
        $('#tag-load i').css('display','none');
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
        var err = eval("(" + xhr.responseText + ")");
        $('.tag').append(err);
    }

/* Level Compile */
function levelCompile(level)
{
    if($.isNumeric(level) && level <= 1000)
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
    else
    {
        $('.newLevel').val("20");
    }
}
    function levelSuccess(result)
    {
        $('.price').text(result);
    }
    function levelError(xhr, status, error)
    {
        var err = eval("(" + xhr.responseText + ")");
        $('.tag').append(err);
    }
