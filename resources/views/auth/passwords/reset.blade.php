@extends('layouts.layout')
@section('title', 'Reset -')
@section('content')
    <div class="layout divFull">


        <div class="layout-box">
            {{ Form::open(array('route' => 'password.request')) }}
            <div class="form-group font-large color-black">
                Reset Password
            </div>


            <input type="hidden" name="token" value="{{ $token }}">

            <hr class="bg-white"/>
            <div class="form-group">
                <input type="email" {{ $errors->has('email') ? ' has-error' : '' }} name="email" value="{{ old('email') }}" placeholder="@lang('auth.form_email')" required autofocus>
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" {{ $errors->has('password') ? ' has-error' : '' }} name="password" value="{{ old('password') }}" placeholder="@lang('auth.form_pass')" required>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" {{ $errors->has('password') ? ' has-error' : '' }} name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="@lang('auth.form_repass')" required>
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
                @if (session('status'))
                    <span class="help-block">
                        <ul>
                            <li>- {{ session('status') }}</li>
                        </ul>
                    </span>
                @endif

            </div>

            <div class="form-group">
                <br />
                <button type="submit" id="button2"/>Reset Password</button>
                <br /><hr class="bg-white"/>
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
