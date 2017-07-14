@extends('payment.layout')
@section('content')
    <div class="layout divFull">
        <div class="layout-box" style="width:auto; background:#f2f2f2;">
            <span class="font-larger color-black fonr-bold">@lang('payment.title')</span>
            <div class="payment">
                <ul>
                    <a href="/paypal">
                        <li class="paypal">
                            <i class="fa fa-paypal"></i><br />
                            Paypal
                        </li>
                    </a>
                    <a href="/bitcoin">
                        <li class="bitcoin">
                            <i class="fa fa-btc"></i><br />
                            Bitcoin
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
@endsection
