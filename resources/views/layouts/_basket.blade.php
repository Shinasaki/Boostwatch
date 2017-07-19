@if (session()->has('works'))
    <?php $works = session('works') ?>
    <div class="basket">
        <table>
            <tr>
                <td class="bg-black" style="border-top-left-radius:5px;"></td>
                <td colspan="2" class="bg-black"><a href="/checkout" class="font-medium color-white center">@lang('payment.basket')</a></td>
            </tr>
            <tr>
                <td></td>
                <td>Tag: </td>
                <td>{{session('works')[0]['tag']}}</td>
            </tr>
            <tr>
                <td></td>
                <td>Rank: </td>
                <td>{{session('works')[0]['currentRank']}} - {{session('works')[0]['newRank']}}</td>
            </tr>
            <tr>
                <td></td>
                <td>Price: </td>
                <td>{{session('works')[0]['price']}}@lang('boost.currency')</td>
            </tr>
            <tr>
                <td></td>
                <td>Server: </td>
                <td>{{session('works')[0]['server']}}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <a href="/checkout/cancel/{{session('works')[0]['work_id']}}">
                        <span class="color-red face-brandvoic">@lang('payment.cancel')</span> <i class="fa fa-times color-red" style="font-size: 16px;"></i>
                    </a>
                </td>
            </tr>
        </table>
    </div>
@endif
