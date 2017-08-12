@extends('dashboard.index')
@section('dashboard-content')
    <div class="progress">
        <div class="progress-bar">
            <div>
                @if(session()->has('progress'))

                    <!-- Reload Rank -->
                    <!--<i class="fa fa-refresh fa-spin fa-fw"></i>-->
                    <i id="progress_reload" class="fa fa-refresh" onclick="progress_reload()" style="cursor:pointer"></i>
                    @lang('dashboard.progress'): <span id="percent">{{session('progress')[0]['percent']}}</span>%

                @else
                    @lang('dashboard.nowork')
                    <style>
                        .progress-bar {
                            animation-play-state: paused;
                            background: #694892;
                        }
                    </style>
                @endif
            </div>
        </div>
    </div>
    <div class="dashboard-rating">
        <table id="big-table">
            <tr id="section1">
                <td>
                    <span>@lang('dashboard.start'): </span>
                    @if(session()->has('progress'))
                        <span>{{session('progress')[0]['startRank']}}</span>
                    @else
                        <span>0</span>
                    @endif
                    <span> SR</span>
                </td>
                <td>
                    <span>@lang('dashboard.current'): </span>
                    @if(session()->has('progress'))
                        <span>{{session('progress')[0]['currentRank']}}</span>
                    @else
                        <span>0</span>
                    @endif
                    <span> SR</span>
                </td>
                <td>
                    <span>@lang('dashboard.new'): </span>
                    @if(session()->has('progress'))
                        <span>{{session('progress')[0]['newRank']}}</span>
                    @else
                        <span>0</span>
                    @endif
                    <span> SR</span>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    @include('dashboard._chat')
                </td>
            </tr>
        </table>

    </div>
@endsection
