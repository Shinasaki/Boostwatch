@extends('layouts.layout')
@section('title', 'Dashboard - ')
@section('content')
    <div class="dashboard divFull">
        <div class="left">
            <div class="dashboard-profile">
                @if (session()->has('progress'))
                    <span class="face-brandvoic" id="dashboard_tag">{{session('progress')[0]['tag']}}</span>
                @else
                    <a href="/boost/rating" class="color-white"><span>@lang('dashboard.boost')</span></a>
                @endif
            </div>
            <div class="dashboard-menu">
                <ul>
                    <a href="/dashboard/rating">
                        <li id="{{ (collect(request()->segments())->last() == 'rating' ? 'active' : '') }}">@lang('boost.rating')</li>
                    </a>
                    <!--ปิด-->
                    <a>
                        <li id="{{ (collect(request()->segments())->last() == 'duo' ? 'active' : '') }}" style="opacity:0.3">
                            @lang('boost.duo')
                            <i class="fa fa-times" aria-hidden="true" style="color:red;"></i>
                        </li>
                    </a>
                    <!--ปิด-->
                    <a>
                        <li id="{{ (collect(request()->segments())->last() == 'placment' ? 'active' : '') }}" style="opacity:0.3">
                            @lang('boost.placement')
                            <i class="fa fa-times" aria-hidden="true" style="color:red;"></i>
                        </li>
                    </a>
                    <a>
                        <li id="{{ (collect(request()->segments())->last() == 'leveling' ? 'active' : '') }}" style="opacity:0.3">
                            @lang('boost.leveling')
                            <i class="fa fa-times" aria-hidden="true" style="color:red;"></i>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
        <div id="right">
            @yield('dashboard-content')
        </div>
    </div>
@endsection
