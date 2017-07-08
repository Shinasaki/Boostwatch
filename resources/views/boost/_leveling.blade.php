@extends('boost.boost')
@section('boost-content')
    <div class="boost-rank">
        <form method="post">
            <div>
                <span>@lang('boost.level')</span><br /><hr /><br />
                <input type="number" name="newLevel" class="newLevel" value="20"/><br /><br /><hr /><br />
            </div>

            <div>
                <span>@lang('boost.tag')</span>
                <span id="tag-load"> <i class="fa fa-spinner fa-spin fa-fw" style="display:none;"></i></i></span>
                <br /><hr /><br />
                <input type="text" name="newRank" class="tag" placeholder="Name#1107"/><br /><br /><hr /><br />
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
                <span>@lang('boost.pay')</span><br /><hr /><br />
                <span id="button" class="checkout">
                    <span class="price">14</span>
                    <span >@lang('boost.currency')</span>
                </span>
                <br /><br /><hr /><br />
            </div>
        </form>
    </div>
@endsection
