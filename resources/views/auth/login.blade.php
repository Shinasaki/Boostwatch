@extends('layouts.layout')
@section('content')
    <div class="layout divFull">
        <div class="layout-box">
            {{ Form::open(array('route' => 'login')) }}
            <div class="form-group font-large color-black">
                @lang('auth.login')
            </div>
            <hr class="bg-white"/>
            <div class="form-group">
                <input type="email" {{ $errors->has('email') ? ' has-error' : '' }} name="email" value="{{ old('email') }}" placeholder="@lang('auth.form_email')" required autofocus>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" {{ $errors->has('password') ? ' has-error' : '' }} name="password" value="{{ old('password') }}" placeholder="@lang('auth.form_pass')" required>
            </div>


            <div class="form-group">
                @if ($errors->any())
                    <span class="help-block">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <br />
                <button type="submit" id="button2"/>@lang('auth.login')</button>
                <br /><hr class="bg-white"/>
                <a href="/register" class="color-black font-medium">@lang('auth.register')</a>
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
