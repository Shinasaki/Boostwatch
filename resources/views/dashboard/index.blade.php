@extends('layouts.layout')
@section('title', 'Dashboard - ')
@section('content')
    <div class="dashboard divFull">
        <div class="left">
            <div class="dashboard-profile">
                @if (session()->has('progress'))
                    <span class="face-brandvoic">{{session('progress')[0]['tag']}}</span>
                @else
                    <a href="/boost/rating" class="color-white"><span>@lang('dashboard.boost')</span></a>
                @endif
            </div>
            <div class="dashboard-menu">
                <ul>
                    <a href="/dashboard/rating">
                        <li id="{{ (collect(request()->segments())->last() == 'rating' ? 'active' : '') }}">Rating</li>
                    </a>
                    <!--ปิด-->
                    <a>
                        <li id="{{ (collect(request()->segments())->last() == 'duo' ? 'active' : '') }}" style="opacity:0.3">
                            Duo
                            <i class="fa fa-times" aria-hidden="true" style="color:red;"></i>
                        </li>
                    </a>
                    <!--ปิด-->
                    <a>
                        <li id="{{ (collect(request()->segments())->last() == 'placment' ? 'active' : '') }}" style="opacity:0.3">
                            Placment
                            <i class="fa fa-times" aria-hidden="true" style="color:red;"></i>
                        </li>
                    </a>
                    <a>
                        <li id="{{ (collect(request()->segments())->last() == 'leveling' ? 'active' : '') }}" style="opacity:0.3">
                            Leveling
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
