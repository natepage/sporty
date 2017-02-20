<md-toolbar class="site-toolbar">
    <div class="md-toolbar-tools">
        @if(!in_array(Route::currentRouteName(), ['login', 'register', 'password.request', 'password.reset']))
            {!! EasyHtml::toggleBtn(null, ['hide-gt-sm' => '']) !!}
        @endif

        <div class="breadcrumbs-container md-breadcrumb md-headline">
            {!! Breadcrumbs::render() !!}
        </div>

        <span flex></span>

        <div layout="row">
            @if(Auth::guest())
                {!! EasyHtml::btn('Login', ['ng-href' => url('/login')]) !!}
                {!! EasyHtml::btn('Register', ['ng-href' => url('/register')]) !!}
            @else
                {!! Form::open(['id' => 'logoutForm', 'url' => url('/logout')]) !!}{!! Form::close() !!}
                {!! EasyHtml::btn('Logout', ['type' => 'submit', 'form' => 'logoutForm']) !!}
            @endif
        </div>
    </div>
</md-toolbar>
