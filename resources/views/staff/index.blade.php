@extends('layouts.layout')
@section('title', 'Staff - ')
@section('content')
    <div class="dashboard divFull">
        <div class="left">
            <div class="dashboard-profile">
                <span class="face-brandvoic" id="dashboard_tag">{{session('progress')[0]['tag']}}</span>
            </div>
            <div class="dashboard-menu">
                <ul>
                    <a href="/staff/dashboard">
                        <li id="{{ ($page == 'dashboard' ? 'active' : '') }}">Dashboard</li>
                    </a>
                </ul>
            </div>
        </div>
        <div id="right">
            @yield('staff-content')
        </div>
    </div>

@endsection
