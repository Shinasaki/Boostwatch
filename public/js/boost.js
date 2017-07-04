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
    var priceBronze = 1;
    var priceSilver = 1;
    var priceGold = 1.3;
    var pricePlatinum = 2;
    var priceDiamond = 3;
    var priceMaster = 5;
    var priceGrand = 10;

    var currentRank = parseInt(currentRank) - 100;
    var newRank = parseInt(newRank);
    var price = newRank - currentRank;

    //Bronze
    if (currentRank <= 1499)
    {
        if (newRank <= 1499)
        {
            //to Bronze
            price = price * priceBronze;
        }
        else if (newRank <= 1999)
        {
            //to Silver
            price = price * priceSilver;
        }
        else if (newRank <= 2499)
        {
            //to Gold
            price = price * priceGold;
        }
        else if (newRank <= 2999)
        {
            //to Platinum
            price = price * pricePlatinum;
        }
        else if (newRank <= 3499)
        {
            //to Diamond
            price = price * priceDiamond;
        }
        else if (newRank <= 3999)
        {
            //to Master
            price = price * priceMaster;
        }
        else if (newRank >= 4000)
        {
            //to Grand
            price = price * priceGrand;
        }
    }

    //Silver
    else if (currentRank <= 1999)
    {
        if (newRank <= 1999)
        {
            //to Silver
            price = price * priceSilver;
        }
        else if (newRank <= 2499)
        {
            //to Gold
            price = price * priceGold;
        }
        else if (newRank <= 2999)
        {
            //to Platinum
            price = price * pricePlatinum;
        }
        else if (newRank <= 3499)
        {
            //to Diamond
            price = price * priceDiamond;
        }
        else if (newRank <= 3999)
        {
            //to Master
            price = price * priceMaster;
        }
        else if (newRank >= 4000)
        {
            //to Grand
            price = price * priceGrand;
        }
    }

    //Gold
    else if (currentRank <= 2499)
    {
        if (newRank <= 2499)
        {
            //to Gold
            price = price * priceGold;
        }
        else if (newRank <= 2999)
        {
            //to Platinum
            price = price * pricePlatinum;
        }
        else if (newRank <= 3499)
        {
            //to Diamond
            price = price * priceDiamond;
        }
        else if (newRank <= 3999)
        {
            //to Master
            price = price * priceMaster;
        }
        else if (newRank >= 4000)
        {
            //to Grand
            price = price * priceGrand;
        }
    }

    //Platinum
    else if (currentRank <= 2999)
    {
        if (newRank <= 2999)
        {
            //to Platinum
            price = price * pricePlatinum;
        }
        else if (newRank <= 3499)
        {
            //to Diamond
            price = price * priceDiamond;
        }
        else if (newRank <= 3999)
        {
            //to Master
            price = price * priceMaster;
        }
        else if (newRank >= 4000)
        {
            //to Grand
            price = price * priceGrand;
        }
    }

    //Diamond
    else if (currentRank <= 3499)
    {
        if (newRank <= 3499)
        {
            //to Diamond
            price = price * priceDiamond;
        }
        else if (newRank <= 3999)
        {
            //to Master
            price = price * priceMaster;
        }
        else if (newRank >= 4000)
        {
            //to Grand
            price = price * priceGrand;
        }
    }

    //Master
    else if (currentRank <= 3999)
    {
        if (newRank <= 3999)
        {
            //to Master
            price = price * priceMaster;
        }
        else if (newRank >= 4000)
        {
            //to Grand
            price = price * priceGrand;
        }
    }

    //Grand
    else if (currentRank >= 4000)
    {
        if (newRank >= 4000)
        {
            //to Grand
            price = price * priceGrand;
        }
    }

    $('.price').text(Math.round(price));
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
            timeout: '10000',
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
        getPrice();
    }
    else
    {
        $('.currentRank').val(0);
        $('.currentRank').prop( "disabled", false );
    }
}

function rankError(xhr, status, error)
{
    var err = eval("(" + xhr.responseText + ")");
    alert(err);
}
function boostSend()
{
    $('#tag-load i').css('display','inline-block');
}

function boostComplete()
{
    $('#tag-load i').css('display','none');
}
