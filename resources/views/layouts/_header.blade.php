<div class="nav pc">
    <ul class="left">
        <li><a href="/" style="color:#fff">Boostwatch</a></li>
        <li><a href="/">@lang('header.home')</a></li>
        <li><a href="why">@lang('header.why')</a></li>
        <li><a href="review">@lang('header.reviews')<i class="fa fa-eye" aria-hidden="true"></i></a></li>
        @if (Auth::check())
            <li><a href="/dashboard/rating">@lang('header.dashboard')<i class="fa fa-tachometer"></i></a></li>
        @endif

    </ul>
    <ul class="right">
        <li id="pc"><a href="/boost/rating" id="highlight">@lang('header.boost')</a></li>
        <li class="dropdown" id="pc"><a>
            @if (Auth::check())
                {{ Auth::user() -> name }}
            @else
                @lang('header.account')
            @endif

        <i class="fa fa-chevron-down"></i></a>
            <ul>
            @if (Auth::check())
                <li><a href="/profile">@lang('header.profile')<i class="fa fa-user-circle"></i></a></li>
                @if (Auth::user()->permission >= 3)
                    <li><a href="/staff/dashboard">@lang('header.staff')<i class="fa fa-pie-chart" aria-hidden="true"></i></a></li>
                @endif
                @if (Auth::user()->permission >= 4)
                    <li><a href="/admin/dashboard">@lang('header.admin')<i class="fa fa-bug" aria-hidden="true"></i></a></li>
                @endif
                <li><a href="/logout">@lang('header.logout')<i class="fa fa-sign-out"></i></a></li>
            @else
                <li><a href="/login">@lang('header.login')<i class="fa fa-sign-in"></i></a></li>
                <li><a href="/register">@lang('header.register')<i class="fa fa-key"></i></a></li>
            @endif
            </ul>
        </li>
    </ul>
</div>

<div class="nav mobile">
    <ul class="left">
        <li><a href="/" style="color:#fff">Boostwatch</a></li>
    </ul>
    <ul class="right">
        <li class="dropdown" id="pc"><a>@lang('header.menu')<i class="fa fa-bars" aria-hidden="true"></i></i></a>
            <ul>
                @if (Auth::check())
                    <li><a href="/dashboard/rating">@lang('header.dashboard')<i class="fa fa-tachometer"></i></a></li>
                    <li><a href="/profile">@lang('header.profile')<i class="icon-user"></i></a></li>
                    @if (Auth::user()->permission >= 3)
                        <li><a href="/admin/dashboard">@lang('header.staff')<i class="fa fa-pie-chart" aria-hidden="true"></i></a></li>
                    @endif
                    @if (Auth::user()->permission >= 4)
                        <li><a href="/admin/dashboard">@lang('header.admin')<i class="fa fa-bug" aria-hidden="true"></i></a></li>
                    @endif
                    <li><a href="/logout">@lang('header.logout')<i class="fa fa-sign-out"></i></a></li>
                @else
                    <li><a href="/login">@lang('header.login')<i class="fa fa-sign-in"></i></a></li>
                    <li><a href="/register">@lang('header.register')<i class="fa fa-key"></i></a></li>
                @endif
                <li><a href="/boost" style="color:orange;">@lang('header.boost')<i class="fa fa-fire"  aria-hidden="true"></i></a></li>
                <li><a href="/why">@lang('header.why')<i class="fa fa-question" aria-hidden="true"></i></a></li>
                <li><a href="/review">@lang('header.reviews')<i class="fa fa-quote-right" aria-hidden="true"></i></a></li>
            </ul>
        </li>
    </ul>
</div>
