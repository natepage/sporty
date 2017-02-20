<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @section('stylesheets')
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
            <link rel="stylesheet" href="{{ asset('css/sport-app.css') }}">
        @show
    </head>
    <body ng-app="SportApp" ng-controller="SportCtrl" layout="row" ng-cloak>
        @yield('before-content')

        <div layout="column" flex>
            @include('layouts.toolbar')

            <md-content id="base-content" layout="column" flex md-scroll-y>
                @if(session('need_measurements'))
                    @include('resources.measurements.dialog-remind')
                @endif

                @yield('content')
            </md-content>
        </div>

        @section('javascripts')
            <script src="https://use.fontawesome.com/91e2a40f7e.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
            <script src="{{ asset('js/sport-app.js') }}"></script>
        @show
    </body>
</html>