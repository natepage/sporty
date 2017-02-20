@extends('home')

@section('content')
    <div>
        @forelse($item->steps as $step)
            <md-card class="steps-line-show">
                <md-card-content layout="row" layout-xs="column">
                    <div layout="row" flex class="step-show-row">
                        <div layout="column" flex>
                            <h6 class="headline">{{ trans('step.fields.exercise') }}</h6>
                            <p>{{ $step->exercise->name }}</p>
                        </div>
                        <div layout="column" flex>
                            <h6 class="headline">{{ trans('step.fields.nb_series') }}</h6>
                            <p>{{ $step->nb_series }}</p>
                        </div>
                        <div layout="column" flex>
                            <h6 class="headline">{{ trans('step.fields.nb_repetitions') }}</h6>
                            <p>{{ $step->nb_repetitions }}</p>
                        </div>
                    </div>
                    <div layout="row" flex class="step-show-row">
                        <div layout="column" flex>
                            <h6 class="headline">{{ trans('step.fields.pace.name') }}</h6>
                            <p>{{ trans(sprintf('step.fields.pace.%s', $step->pace)) }}</p>
                        </div>
                        <div layout="column" flex>
                            <h6 class="headline">{{ trans('step.fields.rest_between') }}</h6>
                            <p>{{ $step->rest_between }} {{ $step->rest_between_unit }}</p>
                        </div>
                    </div>
                </md-card-content>
            </md-card>
            <i>{{ trans('step.show.rest_after', ['time' => $step->rest_after, 'unit' => $step->rest_after_unit]) }}</i>
        @empty
            {{ trans('level.no_step') }}
        @endforelse
    </div>

    @if(Auth::user()->admin)
        {!! EasyHtml::editFabBtn(null, [
            'ng-href' => route('level.edit', [$item->id])],
            ['tooltip' => trans('level.breadcrumbs.edit', ['item' => $item->getCrumb()])
        ]) !!}
    @endif
@endsection
