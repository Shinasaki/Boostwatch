@extends('payment.layout')
@section('content')
    <?php
        $paymentId = $result->id;
        $paymentCart = $result->cart;
        $paymentPayer = array([
                'email' => $result->payer->payer_info->email,
                'first_name' => $result->payer->payer_info->first_name,
                'last_name' => $result->payer->payer_info->last_name,
                'payer_id' => $result->payer->payer_info->payer_id,
                'country' => $result->payer->payer_info->shipping_address->country_code,
            ]);
        $price =  array([
                'price' => $result->transactions[0]->related_resources[0]->sale->amount->total,
                'currency' => $result->transactions[0]->related_resources[0]->sale->amount->currency,
            ]);
        $time = $result->transactions[0]->related_resources[0]->sale->create_time;
        $description = $result->transactions[0]->description
    ?>
    <div class="layout divFull">
        <div class="layout-box" style="width:auto; background:#f2f2f2;">
            <span class="font-larger" style="color:green">Payment Success</span>
            <hr class="bg-black"/>
            <table style="width: 100%;">
                <tr>
                    <td>Payment Id: </td>
                    <td>{{$paymentId}}</td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>{{$description}}</td>
                </tr>
                <tr>
                    <td>Time: </td>
                    <td>{{$time}}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{$paymentPayer[0]['email']}}</td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td>
                        {{$paymentPayer[0]['first_name']}}
                        {{$paymentPayer[0]['last_name']}}
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>{{$price[0]['price']}} {{$price[0]['currency']}}</td>
                </tr>
                <tr>
                    <td>Country: </td>
                    <td>{{$paymentPayer[0]['country']}}</td>
                </tr>
            </table>
            <hr class="bg-black"/>
                <a href="/dashboard" id="button">@lang('payment.dashboard')</a>
                <a href="/history" id="button">@lang('payment.history')</a>
        </div>
    </div>


@endsection
