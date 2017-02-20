@extends('layouts.base')

@section('content')
    <div>
        @yield('auth-before-content')
        <md-card flex-gt-sm="50" flex-offset-gt-sm="25">
            @include('layouts.logo-header')
            @yield('auth-content')
        </md-card>
    </div>
@endsection
