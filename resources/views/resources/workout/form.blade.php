<div ng-controller="workoutCtrl">
    {!! Form::model($item, ['method' => $formMethod, 'url' => $formUrl]) !!}
    <div layout="column">
        <div layout="row">
            <span flex></span>
            {!! EasyHtml::back() !!}
            {!! EasyHtml::submit('Save') !!}
        </div>
        <div layout="column">
            {!! Form::mdSelect(
                'level_id',
                'level_id',
                trans('workout.fields.level'),
                $errors,
                $levels,
                [
                    'required',
                    'ng-init' => sprintf('level_id=%d', $item->level_id),
                    'ng-change' => 'setLevel()'
                ]
            ) !!}

            <md-card style="margin: 0;">
                <md-card-content layout="column">
                    @foreach($level->steps as $step)
                        <div layout="row">
                            <h4 flex="20" style="margin: 0;" layout="row">
                                {!! Form::mdSelect(
                                    sprintf('series[%d][exercise_id]', $loop->iteration),
                                    sprintf('series[%d].exercise_id', $loop->iteration),
                                    trans('workout.fields.exercise'),
                                    $errors,
                                    $exercises
                                ) !!}
                            </h4>
                            <div id="series-container-{{ $step->id }}" flex layout="row">
                                @if(count($item->series) == 0)
                                    @for($i = 0; $i < $step->nb_series; $i++)
                                        <?php
                                        $series = isset($item->series[$loop->index]) ? $item->series[$loop->index] : null;
                                        $serie = null !== $series ? $series->series[$i] : null;
                                        $value = null !== $serie ? $serie : 0;
                                        ?>

                                        {!! Form::control(
                                            'number',
                                            sprintf('series[%d][series][]', $loop->iteration),
                                            trans('workout.fields.series'),
                                            $errors,
                                            ['flex'],
                                            [],
                                            null,
                                            $value
                                        ) !!}
                                    @endfor
                                @else
                                    @foreach($item->series[$loop->index]->series as $serie)
                                        {!! Form::control(
                                            'number',
                                            sprintf('series[%d][series][]', $loop->parent->iteration),
                                            trans('workout.fields.series'),
                                            $errors,
                                            ['flex'],
                                            [],
                                            null,
                                            $serie
                                        ) !!}
                                    @endforeach
                                @endif
                            </div>
                            {!! EasyHtml::btn(trans('workout.actions.add_serie'), [
                                'id' => sprintf('btn-add-serie-%d', $step->id),
                                'ng-click' => sprintf('addSerie(%d)', $step->id)
                            ]) !!}
                        </div>
                    @endforeach
                </md-card-content>
            </md-card>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript">
        window.translations = {
            'series': '{{ trans('workout.fields.series') }}'
        };

        window.series = {
            @if(count($item->series) == 0)
                @foreach($level->steps as $step)
                    {!! sprintf('%d: {\'exercise_id\': %d}%s', $loop->iteration, $step->exercise_id, $loop->last ? '' : ',') !!}
                @endforeach
            @else
                @foreach($item->series as $serie)
                    {!! sprintf('%d: {\'exercise_id\': %d}%s', $loop->iteration, $serie->exercise_id, $loop->last ? '' : ',') !!}
                @endforeach
            @endif
        };
    </script>
</div>