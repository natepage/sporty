@extends('home')

@section('content')
    <div ng-controller="measurementsCtrl">
        @if(session('success'))
            {!! EasyHtml::notify(session('success')) !!}
        @endif

        @forelse($items as $item)
            <md-card style="float: left; max-width: 250px; height: 450px;">
                <div class="sport-card-header">
                    <h2 class="md-title sport-card-title" layout="row">
                        <span flex>{{ $item->created_at }}</span>
                        <span>{{ $item->weight }} kg</span>
                    </h2>
                </div>
                <md-card-content>
                    <table>
                        @foreach($item->getBodyDatas() as $data)
                            <tr>
                                <td class="body-data-field">{{ trans('measurements.fields.' . $data) }}</td>
                                <td class="body-data-value">
                                    @if($item->{$data} !== null){{ $item->{$data} }}@else - @endif cm
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </md-card-content>
                <md-divider></md-divider>
                <md-card-header style="padding-bottom: 0;">
                    <md-card-header-text>
                        <span class="md-subhead">{{ trans('measurements.fields.feeling.past') }}</span>
                    </md-card-header-text>
                </md-card-header>
                <md-card-content style="padding-top: 0; min-height: 120px;">
                    <p>
                        @if($item->feeling !== null && $item->feeling != '')
                            {{ $item->feeling }}
                        @else
                            <i>{{ trans('measurements.no_feeling') }}</i>
                        @endif
                    </p>
                </md-card-content>
                <md-card-actions layout="row" layout-align="end center">
                    {!! EasyHtml::warnBtn(trans('measurements.actions.destroy'), [
                        'ask-title' => trans('measurements.ask.destroy.title'),
                        'ask-content' => trans('measurements.ask.destroy.content'),
                        'ask-ok' => trans('measurements.ask.destroy.ok'),
                        'ask-cancel' => trans('measurements.ask.destroy.cancel'),
                        'id' => 'btn-ask-detroy-' . $item->id,
                        'ng-click' => 'askDestroy($event, ' . $item->id . ')'
                    ]) !!}
                    {!! EasyHtml::btn(trans('measurements.actions.edit'), [
                        'ng-href' => route('measurements.edit', [$item->id])
                    ]) !!}

                    {!! Form::open([
                        'id' => 'form-destroy-' . $item->id,
                        'method' => 'DELETE',
                        'route' => ['measurements.destroy', $item->id]
                    ]) !!}
                    {!! Form::close() !!}
                </md-card-actions>
            </md-card>
        @empty
            {{ trans('measurements.empty') }}
        @endforelse
    </div>

    {!! EasyHtml::createFabBtn(null, [
        'ng-href' => route('measurements.create')],
        ['tooltip' => trans('measurements.breadcrumbs.create')
    ]) !!}
@endsection
