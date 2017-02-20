<md-sidenav class="main-sidenav md-sidenav-left" md-component-id="main-sidenav" hide-print md-is-locked-open="$mdMedia('gt-sm')">
    @include('layouts.logo-header')

    <md-content flex role="navigation">
        <ul class="main-menu">
            <li>
                {!! EasyHtml::btn(trans('workout.breadcrumbs.index'), [
                    'ng-href' => route('workout.index'),
                    'class' => 'main-menu-link'
                ]) !!}
            </li>
            <li>
                {!! EasyHtml::btn(trans('measurements.breadcrumbs.index'), [
                    'ng-href' => route('measurements.index'),
                    'class' => 'main-menu-link'
                ]) !!}
            </li>
            <li>
                {!! EasyHtml::btn(trans('level.breadcrumbs.index'), [
                    'ng-href' => route('level.index'),
                    'class' => 'main-menu-link'
                ]) !!}
            </li>
        </ul>
    </md-content>
</md-sidenav>
