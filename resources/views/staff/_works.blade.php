<div class="staff-works">
    <div class="works-list">
        <table>
            <tr class="bg-black">
                <td>Tag</td>
                <td>Server</td>
                <td>Start</td>
                <td>New</td>
                <td>Price</td>
                <td>Receive</td>
            </tr>
            @foreach ($collect_works as $collect)
                {{ Form::open(array('url' => '/staff/dashboard/'.$collect->id)) }}
                <tr class="color-black">
                    <td class="face-brandvoic">{{$collect->tag}}</td>
                    <td>{{$collect->server}}</td>
                    <td>{{$collect->startRank}}</td></td>
                    <td>{{$collect->newRank}}</td>
                    <td>{{$collect->price}}</td>
                    <td>{{ Form::submit('Receive')}}</td>
                {{ Form::close() }}
                </tr>
            @endforeach

        </table>
    </div>
    <div class="works-panel">

    </div>
</div>
