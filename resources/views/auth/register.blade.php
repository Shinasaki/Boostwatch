@extends('layouts.layout')
@section('content')
    <div class="layout divFull">
        <div class="layout-box">
            {{ Form::open(array('route' => 'register')) }}
            <div class="form-group font-large color-black">
                @lang('auth.register')
            </div>
            <hr class="bg-white"/>
            <div class="form-group">
                <input type="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" placeholder="@lang('auth.form_email')" required autofocus>
            </div>

            <div class="form-group">
                <input type="text" class="left {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ old('name') }}" placeholder="@lang('auth.form_name')" required autofocus style="width: 45%;">

                <input type="text" class="right {{ $errors->has('lastsurname') ? ' has-error' : '' }}" name="surname" value="{{ old('surname') }}" placeholder="@lang('auth.form_surname')" required autofocus style="width: 45%;" >
            </div>




            <div class="clear form-group">
                <input type="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="@lang('auth.form_pass')" required>
                <input type="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" name="password_confirmation" placeholder="@lang('auth.form_repass')" required>
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
                <button type="submit" id="button2"/>@lang('auth.register')</button>
                <br /><hr class="bg-white"/>
                <a href="/login" class="color-black font-medium">@lang('auth.login')</a>
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
