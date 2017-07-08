@extends('layouts.layout')
@section('content')
    <div class="layout divFull">
        <div class="layout-box">
            {{ Form::open(array('route' => 'password.email')) }}
            <div class="form-group font-large color-black">
                @lang('auth.reset')
            </div>
            <hr class="bg-white"/>
            <div class="form-group">
                <input type="email" {{ $errors->has('email') ? ' has-error' : '' }} name="email" value="{{ old('email') }}" placeholder="@lang('auth.form_email')" required autofocus>
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
                <button type="submit" id="button2"/>@lang('auth.reset')</button>
                <br /><hr class="bg-white"/>
                <a href="/login" class="color-black font-medium">@lang('auth.login')</a><br />
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
