@extends('layouts.auth')

@section('auth-content')
    {!! Form::open(['url' => url('/password/email')]) !!}
        <md-card-title>
            <md-cart-title-text><span class="md-headline">Reset password</span></md-cart-title-text>
        </md-card-title>
        <md-card-content layout="column">
            {!! Form::control('email', 'email', 'Email Address', $errors, ['required']) !!}
        </md-card-content>
        <md-cart-actions layout="row" layout-align="end center">
            {!! EasyHtml::submit('Send Password Reset Link') !!}
        </md-cart-actions>
    {!! Form::close() !!}
@endsection
