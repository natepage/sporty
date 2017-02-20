@extends('layouts.auth')

@section('auth-before-content')
    @if(session('status'))
        {!! EasyHtml::notify(session('status')) !!}
    @endif
@endsection

@section('auth-content')
    {!! Form::open(['url' => url('/password/reset')]) !!}
        <md-card-title>
            <md-cart-title-text><span class="md-headline">Reset password</span></md-cart-title-text>
        </md-card-title>
        <md-card-content layout="column">
            {!! Form::hidden('token', $token) !!}
            {!! Form::control('email', 'email', 'Email Address', $errors, ['required']) !!}
            {!! Form::control('password', 'password', 'Password', $errors, ['required']) !!}
            {!! Form::control('password', 'password_confirmation', 'Confirm Password', $errors, ['required']) !!}
        </md-card-content>
        <md-cart-actions layout="row" layout-align="end center">
            {!! EasyHtml::submit('Reset password') !!}
        </md-cart-actions>
    {!! Form::close() !!}
@endsection
