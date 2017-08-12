@extends('staff.index')
@section('staff-content')


    <div class="progress">
        <div class="progress-bar">
            <div>


                <!-- Have Work -->
                @if(session()->has('staff_works'))

                    <!-- Reload Rank -->
                    <i id="progress_reload" class="fa fa-refresh" onclick="progress_reload()" style="cursor:pointer"></i>
                    @lang('dashboard.progress'): <span id="percent">{{session('progress')[0]['percent']}}</span>%


                <!-- No Work -->
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
                    <span>เงินในระบบ: </span>
                    <span> {{Auth::user()->money}}</span>
                    <span>$</span>
                </td>


                <td>
                    <span>งานตอนนี้: </span>
                    @if (session()->has('staff_works'))
                        <span class="face-brandvoic">{{ session('staff_works')[0]['tag']}}</span>
                    @else
                        <span class="face-brandvoic">@lang('dashboard.nowork')</span>
                    @endif
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
