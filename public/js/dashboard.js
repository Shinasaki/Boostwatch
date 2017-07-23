function set_height(element) {
    pageHeight = $(window).height();
    pageHeight -= $('.nav li').height();
    $(element).css('height', pageHeight);
}

function progress_bar() {
    current = $('.progress-bar #percent').text();
    width_min = $('.progress-bar').width();
    width_max = $('.progress').width() - $('.dashboard .left').width() ;

    width_current = (current * width_max) / 100;
    if (current < 15) {
        width_current = width_min;
    }

    $('.progress-bar').css('width', width_current);

    $('.dashboard-rating #big-table').css('width', width_max);
    $('.chat-msg').css('height', ($(window).height() + 65) - $('.nav li').height() - $('.progress-bar').height() - $('.chat-submit').height() - $('#big-table:first-child').height());
}


// Chat Function
function chat(msg) {
    if (msg.length > 0) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            url: '/ajax/chat',
            data: 'msg='+msg,
            type: 'POST',
            beforeSend: chatSend,
            complete: chatComplete,
            timeout: '1000',
            success: chatSuccess,
            error: chatError,
        });
    }
}
    function chatSend() {
    }
    function chatComplete() {

    }
    function chatSuccess(result) {
        if(result == 'success') {
            // when success
            chatMsg();
        } else {
            alert(result);
        }
    }
    function chatError(request, status, error) {
        $('content').html(request.responseText);
    }


function chatMsg() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url: '/ajax/chatMsg',
        timeout: '1000',
        data: 'allow=true',
        type: 'POST',
        success: chatMsgSuccess,
        error: chatError,
    });
}
    function chatMsgSuccess(result) {
        $('.chat-msg table').html("");
        $.each(result[0], function(key, value) {
            if (value['user_id'] == result[1]) {
                $('.chat-msg table').append(
                    "<tr><td><span style='color:#444;'>"+value['name']+"</span> <span> : </span> <span class='color-black'>"+value['message']+"</span></td><td></td></tr>"
                );
            } else {
                $('.chat-msg table').append(
                    "<tr><td></td><td> : <span class='color-black'>"+value['message']+"</span>  <span> : </span>  <span style='color:#444;'>"+value['name']+"</span></td></tr>"
                );
            }
        });
        $(".chat-msg").animate({ scrollTop: $('.chat-msg')[0].scrollHeight }, 0);
    }
