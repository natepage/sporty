@extends('home')

@section('content')
    @if(session('success'))
        {!! EasyHtml::notify(session('success')) !!}
    @endif

    <md-card ng-controller="levelCtrl">
        <md-card-content>
            <table>
                @forelse($items as $item)
                    <tr @if(!$loop->last)class="items-list-line"@endif>
                        <td>{{ $item->name }}</td>
                        <td class="items-list-actions">
                            {!! EasyHtml::btn(trans('level.actions.show'), [
                                'ng-href' => route('level.show', [$item->id])
                            ]) !!}
                            @if(Auth::user()->admin)
                                {!! EasyHtml::btn(trans('level.actions.edit'), [
                                    'ng-href' => route('level.edit', [$item->id])
                                ]) !!}
                                {!! EasyHtml::warnBtn(trans('level.actions.destroy'), [
                                    'ask-title' => trans('level.ask.destroy.title'),
                                    'ask-content' => trans('level.ask.destroy.content'),
                                    'ask-ok' => trans('level.ask.destroy.ok'),
                                    'ask-cancel' => trans('level.ask.destroy.cancel'),
                                    'id' => 'btn-ask-detroy-' . $item->id,
                                    'ng-click' => 'askDestroy($event, ' . $item->id . ')'
                                ]) !!}
                                {!! Form::open([
                                    'id' => 'form-destroy-' . $item->id,
                                    'method' => 'DELETE',
                                    'route' => ['level.destroy', $item->id],
                                    'style' => 'display: none'
                                ]) !!}
                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td>{{ trans('level.empty') }}</td></tr>
                @endforelse
            </table>
        </md-card-content>
    </md-card>

    @if(Auth::user()->admin)
        {!! EasyHtml::createFabBtn(null,
            ['ng-href' => route('level.create')],
            ['tooltip' => trans('level.breadcrumbs.create')]
        ) !!}
    @endif
@endsection
