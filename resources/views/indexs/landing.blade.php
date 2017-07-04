@include('layouts._language')
@extends('layouts.layout')
@section('content')

    <div class="landing">
        <div class="landing-bg divFull">
            <div class="landing-logo imgFit">
                <a href="boost"><img src="{{asset('image/landing/logo.png')}}"/></a>
            </div>
            <div class="landing-popup">
                <ul>
                    <a>
                        <li>
                            @lang('landing.prop-1')
                             &nbsp;&nbsp;
                            <i class="fa fa-shield" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a>
                        <li>
                            @lang('landing.prop-2') &nbsp;&nbsp;
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a>
                        <li>
                            @lang('landing.prop-3') &nbsp;&nbsp;
                            <i class="fa fa-diamond" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a href="http://youtube.com" target="_blank">
                        <li>
                            @lang('landing.prop-4') &nbsp;&nbsp;
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
@endsection
