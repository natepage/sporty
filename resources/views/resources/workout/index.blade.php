@extends('home')

@section('content')
    <div ng-controller="workoutCtrl">
        @if(session('success'))
            {!! EasyHtml::notify(session('success')) !!}
        @endif

        @forelse($items as $item)
            <md-card style="float: left; width: 255px;">
                <div class="sport-card-header">
                    <h2 class="md-title sport-card-title" layout="row">{{ $item->created_at }}</h2>
                </div>
                <md-card-content>
                    <h4>{{ $item->level->name }}</h4>
                </md-card-content>
                <md-divider></md-divider>
                <md-card-content>
                    <md-content md-scroll-y style="background-color: white; height: 160px;">
                        <table>
                            @foreach($item->series as $serie)
                                <tr>
                                    <td class="body-data-field md-title">{{ $serie->exercise->name }}</td>
                                    <td class="body-data-value">
                                        @foreach($serie->series as $repetitions)
                                            {{ $repetitions }} @if(!$loop->last)|@endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </md-content>
                </md-card-content>
                <md-card-actions layout="row" layout-align="end center">
                    {!! EasyHtml::warnBtn(trans('workout.actions.destroy'), [
                        'ask-title' => trans('workout.ask.destroy.title'),
                        'ask-content' => trans('workout.ask.destroy.content'),
                        'ask-ok' => trans('workout.ask.destroy.ok'),
                        'ask-cancel' => trans('workout.ask.destroy.cancel'),
                        'id' => 'btn-ask-detroy-' . $item->id,
                        'ng-click' => 'askDestroy($event, ' . $item->id . ')'
                    ]) !!}
                    {!! EasyHtml::btn(trans('workout.actions.edit'), [
                        'ng-href' => route('workout.edit', [$item->id])
                    ]) !!}

                    {!! Form::open([
                        'id' => 'form-destroy-' . $item->id,
                        'method' => 'DELETE',
                        'route' => ['workout.destroy', $item->id]
                    ]) !!}
                    {!! Form::close() !!}
                </md-card-actions>
            </md-card>
        @empty
            {{ trans('workout.empty') }}
        @endforelse
    </div>

    {!! EasyHtml::createFabBtn(null, [
        'ng-href' => route('workout.create')],
        ['tooltip' => trans('workout.breadcrumbs.create')
    ]) !!}
@endsection
