<!DOCTYPE html>

<script type="text/javascript">
      var base_url = '{{ url('/') }}';
</script>


<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- META -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google" content="notranslate" />
        <meta name="description" content="@lang('meta.description')" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- TITLE -->
        <title>@yield('title')Boostwatch</title>


        <!-- Style -->
        {{ HTML::style('css/jquery-ui.css') }}
        {{ HTML::style('css/layout.css') }}
        {{ HTML::style('css/scroll.css') }}
        {{ HTML::style('css/boost.css') }}
        {{ HTML::style('css/payment.css') }}
        {{ HTML::style('css/dashboard.css') }}


        <!-- JS -->
        {{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/jquery-ui.js') }}
        {{ HTML::script('js/screen.js') }}
        {{ HTML::script('js/layout.js') }}
        {{ HTML::script('js/boost.js') }}
        {{ HTML::script('js/dashboard.js') }}
        {{ HTML::script('js/jquery.cookie.js') }}


    </head>

    <!-- Body -->
    <body>
        <div style="z-index:5;position:fixed;bottom:10px;right:10px;">
            <button onclick="doorOpen()">Open</button>
            <button onclick="doorClose()" >Close</button>
            <button onclick="popup_open()">Popup Open</button>
            <button onclick="popup_close()" >Popup Close</button>
        </div>
        @include('layouts._animate')
        @include('layouts._popup')
        @include('layouts._basket')
        <div class="container">
            @include('layouts._header')
            @yield('content')
            @include('layouts._footer')
        </div>


    </body>
</html>
