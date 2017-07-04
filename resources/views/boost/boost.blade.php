@extends('layouts.layout')
@section('title', 'Boost - ')
@section('content')
    <div class="boost divFull">
        <div class="boost-box">
            <div class="boost-menu">
                <ul>

                    <a href="rating" id="{{ (collect(request()->segments())->last() == 'rating' ? 'active' : '') }}"><li>@lang('boost.rating')</li></a>


                    <!-- ยังไม่เปิด -->
                    <a style="opacity:0.3" id="{{ (collect(request()->segments())->last() == 'duo' ? 'active' : '') }}"><li>@lang('boost.duo')&nbsp; <i class="fa fa-times" aria-hidden="true" style="color:red;"></i></li></a>

                    <!-- ยังไม่เปิด -->
                    <a style="opacity:0.3" id="{{ (collect(request()->segments())->last() == 'placment' ? 'active' : '') }}"><li>@lang('boost.placment')&nbsp; <i class="fa fa-times" aria-hidden="true" style="color:red;"></i></li></a>


                    <a href="leveling" id="{{ (collect(request()->segments())->last() == 'leveling' ? 'active' : '') }}"><li>@lang('boost.leveling')</li></a>
                </ul>
            </div>
            <div class="boost-content">
                @yield('boost-content')
            </div>
        </div>
    </div>
@endsection
