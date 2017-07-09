@extends('boost.boost')
@section('boost-content')
    <div class="boost-rank">
        {{ Form::open(array('route' => 'Checkout_rating')) }}
            <div>
                <span>@lang('boost.current')</span><br /><hr /><br />
                <input type="number" name="currentRank" class="currentRank" value="1700"/><br /><br /><hr /><br />
                <span class="boost-img1"><img src="{{asset('image/rank/2.png')}}" /></span>
            </div>
            <div>
                <span>@lang('boost.new')</span><br /><hr /><br />
                <input type="number" name="newRank" class="newRank" value="3000"/><br /><br /><hr /><br />
                <span class="boost-img2"><img src="{{asset('image/rank/5.png')}}" /></span>
            </div>

            <div style="clear:both;">
                <span>@lang('boost.server')</span><br /><hr /><br />
                <select name="server" class="server">
                    <option value="us">@lang('boost.us')</option>
                    <option value="eu">@lang('boost.eu')</option>
                    <option value="kr">@lang('boost.kr')</option>
                </select>

                <br /><br /><hr /><br />
            </div>
            <div>
                <span>@lang('boost.tag')</span>
                <span id="tag-load"> <i class="fa fa-spinner fa-spin fa-fw" style="display:none;"></i></i></span>
                <br /><hr /><br />
                <input type="text" name="tag" class="tag" placeholder="Name#1107"/><br /><br /><hr /><br />
            </div>

            <div style="clear:both;">
                <span>@lang('boost.bnet_email')</span><br /><hr /><br />
                <input type="email" name="bnet_email" class="bnet_email" placeholder="@lang('boost.bnet_email')"/><br /><br /><hr /><br />
            </div>

            <div>
                <span>@lang('boost.bnet_pass')</span><br /><hr /><br />
                <input type="password" name="bnet_pass" class="bnet_pass" placeholder="@lang('boost.bnet_pass')"/><br /><br /><hr /><br />
            </div>

            <div style="clear:both;">
                <span>@lang('boost.pay')</span><br /><hr /><br />
                <button type="submit" id="button" class="checkout" disabled>
                    <span class="price">50</span>
                    <span >@lang('boost.currency')</span>
                </button>
                <br /><br /><hr /><br />
            </div>
        {{ Form::close() }}
    </div>
@endsection
