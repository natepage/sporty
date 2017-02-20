@extends('layouts.auth')

@section('auth-content')
    {!! Form::open(['url' => '/register']) !!}
        <md-card-title>
            <md-cart-title-text><span class="md-headline">Register</span></md-cart-title-text>
        </md-card-title>
        <md-card-content layout="column">
            {!! Form::control('text', 'name', 'Name', $errors, ['required']) !!}
            {!! Form::control('email', 'email', 'Email Address', $errors, ['required']) !!}
            {!! Form::control('password', 'password', 'Password', $errors, ['required']) !!}
            {!! Form::control('password', 'password_confirmation', 'Confirm Password', $errors, ['required']) !!}
        </md-card-content>
        <md-cart-actions layout="row" layout-align="end center">
            {!! EasyHtml::submit('Register') !!}
        </md-cart-actions>
    {!! Form::close() !!}
@endsection