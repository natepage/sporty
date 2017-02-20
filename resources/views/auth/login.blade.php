@extends('layouts.auth')

@section('auth-content')
    <div ng-controller="loginCtrl">
        {!! Form::open(['url' => url('/login')]) !!}
        <md-card-title>
            <md-cart-title-text><span class="md-headline">Login</span></md-cart-title-text>
        </md-card-title>
        <md-card-content layout="column">
            {!! Form::control('email', 'email', 'Email Address', $errors, ['required']) !!}
            {!! Form::control('password', 'password', 'Password', $errors, ['required']) !!}
            {!! EasyHtml::remember(null, [], ['checked' => old('remember') ? 'true' : 'false']) !!}
        </md-card-content>
        <md-cart-actions layout="row" layout-align="end center">
            {!! EasyHtml::primaryBtn('Forgot your password?', ['ng-href' => url('/password/reset')]) !!}
            {!! EasyHtml::submit('Login') !!}
        </md-cart-actions>
        {!! Form::close() !!}
    </div>
@endsection
