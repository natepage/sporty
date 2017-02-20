<?php
    $ids = [];
    foreach ($item->steps as $step) {
        $ids[] = $step->id;
    }
    if (session('_old_input')) {
        $oldInputs = session('_old_input');
        if (isset($oldInputs['steps'])) {
            foreach (array_keys($oldInputs['steps']) as $stepId) {
                if (!in_array($stepId, $ids)) {
                    $ids[] = $stepId;
                }
            }
        }
    }
?>

<div ng-controller="levelCtrl">
    {!! Form::model($item, ['method' => $formMethod, 'url' => $formUrl]) !!}
    <div layout="column">
        <div layout="row">
            <span flex></span>
            {!! EasyHtml::back() !!}
            {!! EasyHtml::submit('Save') !!}
        </div>
        <div layout="column">
            {!! Form::control('text', 'name', trans('level.fields.name'), $errors) !!}

            <h2 class="md-headline">
                {{ trans('step.title') }}
                {!! EasyHtml::raisedBtn(trans('step.actions.add'), ['ng-click' => 'addStep()']) !!}
            </h2>

            <div id="steps-container">
                @foreach($ids as $id)
                    <md-card class="steps-line">
                        <md-card-content layout="column">
                            <div layout="row" flex>
                                {!! Form::mdSelect(
                                    sprintf('steps[%d][exercise_id]', $id),
                                    sprintf('steps[%d].exercise_id', $id),
                                    trans('step.fields.exercise'),
                                    $errors,
                                    $exercises,
                                    ['required'],
                                    [],
                                    sprintf('steps.%d.exercise_id', $id)
                                ) !!}
                                {!! Form::control(
                                    'number',
                                    sprintf('steps[%d][nb_series]', $id),
                                    trans('step.fields.nb_series'),
                                    $errors,
                                    ['ng-model' => sprintf('steps[%d].nb_series', $id), 'required'],
                                    [],
                                    sprintf('steps.%d.nb_series', $id)
                                ) !!}
                                {!! Form::control(
                                    'number',
                                    sprintf('steps[%d][nb_repetitions]', $id),
                                    trans('step.fields.nb_repetitions'),
                                    $errors,
                                    ['ng-model' => sprintf('steps[%d].nb_repetitions', $id), 'required'],
                                    [],
                                    sprintf('steps.%d.nb_repetitions', $id)
                                ) !!}
                                {!! Form::mdSelect(
                                    sprintf('steps[%d][pace]', $id),
                                    sprintf('steps[%d].pace', $id),
                                    trans('step.fields.pace.name'),
                                    $errors,
                                    [
                                        'slow' => trans('step.fields.pace.slow'),
                                        'normal' => trans('step.fields.pace.normal'),
                                        'fast' => trans('step.fields.pace.fast')
                                    ],
                                    ['required'],
                                    [],
                                    sprintf('steps.%d.pace', $id)
                                ) !!}
                            </div>
                            <div layout="row" flex>
                                {!! Form::control(
                                    'number',
                                    sprintf('steps[%d][rest_between]', $id),
                                    trans('step.fields.rest_between'),
                                    $errors,
                                    ['ng-model' => sprintf('steps[%d].rest_between', $id), 'required']
                                ) !!}
                                {!! Form::mdSelect(
                                    sprintf('steps[%d][rest_between_unit]', $id),
                                    sprintf('steps[%d].rest_between_unit', $id),
                                    trans('step.fields.rest_between_unit'),
                                    $errors,
                                    [
                                        'sec' => 'sec',
                                        'min' => 'min'
                                    ],
                                    ['required'],
                                    [],
                                    sprintf('steps.%d.rest_between_unit', $id)
                                ) !!}
                                {!! Form::control(
                                    'number',
                                    sprintf('steps[%d][rest_after]', $id),
                                    trans('step.fields.rest_after'),
                                    $errors,
                                    ['ng-model' => sprintf('steps[%d].rest_after', $id), 'required'],
                                    [],
                                    sprintf('steps.%d.rest_after', $id)
                                ) !!}
                                {!! Form::mdSelect(
                                    sprintf('steps[%d][rest_after_unit]', $id),
                                    sprintf('steps[%d].rest_after_unit', $id),
                                    trans('step.fields.rest_after_unit'),
                                    $errors,
                                    [
                                        'sec' => 'sec',
                                        'min' => 'min'
                                    ],
                                    ['required'],
                                    [],
                                    sprintf('steps.%d.rest_after_unit', $id)
                                ) !!}
                                {!! Form::control(
                                    'number',
                                    sprintf('steps[%d][order]', $id),
                                    trans('step.fields.order'),
                                    $errors,
                                    ['ng-model' => sprintf('steps[%d].order', $id)],
                                    [],
                                    sprintf('steps.%d.order', $id)
                                ) !!}
                            </div>
                            <div layout="row" flex>
                                {!! EasyHtml::warnBtn(trans('step.actions.remove'), [
                                    'flex' => '',
                                    'id' => sprintf('btn-remove-step-%d', $id),
                                    'ng-click' => sprintf('removeStep(%d)', $id)
                                ]) !!}
                            </div>
                        </md-card-content>
                    </md-card>
                @endforeach
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript">
        window.exercises = [
            @foreach($exercises as $id => $name)
                {!! sprintf('{id: %d, name: \'%s\'}%s', $id, $name, $loop->last ? '' : ',') !!}
            @endforeach
        ];

        window.translations = {
            'exercise_id': '{{ trans('step.fields.exercise') }}',
            'nb_series': '{{ trans('step.fields.nb_series') }}',
            'nb_repetitions': '{{ trans('step.fields.nb_repetitions') }}',
            'pace': {
                'name': '{{ trans('step.fields.pace.name') }}',
                'slow': '{{ trans('step.fields.pace.slow') }}',
                'normal': '{{ trans('step.fields.pace.normal') }}',
                'fast': '{{ trans('step.fields.pace.fast') }}'
            },
            'rest_between': '{{ trans('step.fields.rest_between') }}',
            'rest_between_unit': '{{ trans('step.fields.rest_between_unit') }}',
            'rest_after': '{{ trans('step.fields.rest_after') }}',
            'rest_after_unit': '{{ trans('step.fields.rest_after_unit') }}',
            'order': '{{ trans('step.fields.order') }}',
            'actions': {
                'remove': '{{ trans('step.actions.remove') }}'
            }
        };

        window.steps = {
            @if(session('_old_input'))
                @foreach(session('_old_input.steps') as $id => $step)
                    {!! sprintf('\'%d\': {', $id) !!}
                    {!! sprintf('\'exercise_id\': %d,', $step['exercise_id']) !!}
                    {!! sprintf('\'nb_series\': %d,', $step['nb_series']) !!}
                    {!! sprintf('\'nb_repetitions\': %d,', $step['nb_repetitions']) !!}
                    {!! sprintf('\'pace\': \'%s\',', $step['pace']) !!}
                    {!! sprintf('\'rest_between\': %d,', $step['rest_between']) !!}
                    {!! sprintf('\'rest_after\': %d,', $step['rest_after']) !!}
                    {!! sprintf('\'rest_between_unit\': \'%s\',', $step['rest_between_unit']) !!}
                    {!! sprintf('\'rest_after_unit\': \'%s\',', $step['rest_after_unit']) !!}
                    {!! sprintf('\'order\': %d,', $step['order']) !!}
                    {!! sprintf('}%s', $loop->last ? '' : ',') !!}
                @endforeach
            @else
                @foreach($item->steps as $step)
                    {!! sprintf('\'%d\': {', $step->id) !!}
                    {!! sprintf('\'exercise_id\': %d,', $step->exercise_id) !!}
                    {!! sprintf('\'nb_series\': %d,', $step->nb_series) !!}
                    {!! sprintf('\'nb_repetitions\': %d,', $step->nb_repetitions) !!}
                    {!! sprintf('\'pace\': \'%s\',', $step->pace) !!}
                    {!! sprintf('\'rest_between\': %d,', $step->rest_between) !!}
                    {!! sprintf('\'rest_after\': %d,', $step->rest_after) !!}
                    {!! sprintf('\'rest_between_unit\': \'%s\',', $step->rest_between_unit) !!}
                    {!! sprintf('\'rest_after_unit\': \'%s\',', $step->rest_after_unit) !!}
                    {!! sprintf('\'order\': %d,', $step->order) !!}
                    {!! sprintf('}%s', $loop->last ? '' : ',') !!}
                @endforeach
            @endif
        };
    </script>
</div>
