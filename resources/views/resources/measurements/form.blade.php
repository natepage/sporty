<div ng-controller="measurementsCtrl">
    {!! Form::model($item, ['method' => $formMethod, 'url' => $formUrl]) !!}
    <div layout="column">
        <div layout="row">
            <span flex></span>
            {!! EasyHtml::back() !!}
            {!! EasyHtml::submit('Save') !!}
        </div>
        <div layout-gt-xs="row">
            <div flex-gt-xs="50">
                @include('resources.measurements.form-general')
            </div>
            <div flex-gt-xs="50">
                @include('resources.measurements.form-body')
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
