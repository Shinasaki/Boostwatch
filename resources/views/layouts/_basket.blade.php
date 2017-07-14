@if (session()->has('work_id'))
    <div class="basket">
        <table>
            @foreach (session('work_id') as $work)
                <?php
                    $datas = DB::table('works')
                        ->select('id','tag', 'currentRank', 'newRank', 'price')
                        ->where('id', $work)
                        ->get()
                ?>
                @foreach ($datas as $data)
                    <tr>
                        <td></td>
                        <td>
                            <a href="/checkout">{{$data->tag}}</a>
                        </td>
                        <td>
                            ({{$data->currentRank}} - {{$data->newRank}})
                            <a href="/checkout/cancel/{{$data->id}}"><i class="fa fa-times color-red" style="font-size: 16px;"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>
@endif
