@if (session()->has('progress'))
<div class="dashboard-chat">
    <div class="chat-msg">
        <table>

        </table>
    </div>
    <div class="chat-submit" style="">
        <input type="text" maxlength="100" class="msg" id="msg" placeholder="@lang('dashboard.placholder')"/><button class="msg_submit" id="msg_submit">@lang('dashboard.send')</button>
    </div>
</div>
@else
    <style>
        .dashboard-chat a{
            transition: 0.3s;
        }
        .dashboard-chat a:hover {
            opacity: 0.8;
        }
    </style>
    <div class="dashboard-chat">
        <div style="text-align:center; padding: 30px; background: #f2f2f2; border-radius:5px;">
            <a href="/boost/rating">
                <span class="color-black">
                    <i class="fa fa-plus-circle color-orange" aria-hidden="true" style="font-size: 200px;"></i><br />
                    @lang('dashboard.addwork')
                </span>
            </a>
        </div>
    </div>
    <div class="chat-submit">

    </div>
@endif
