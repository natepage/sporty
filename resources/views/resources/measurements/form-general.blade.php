@extends('layouts.card')

@section('sport-card-title')
    {{ trans('measurements.form.titles.general') }}
@overwrite

@section('sport-card-content')
    <div layout="column">
        {!! Form::control('float', 'weight', trans('measurements.fields.weight'), $errors, ['required']) !!}
        {!! Form::control('textarea', 'feeling', trans('measurements.fields.feeling.present'), $errors, [
            'ng-model' => 'feeling',
            'md-maxlength' => 150,
            'md-select-on-focus',
            'rows' => 5,
            'cols' => 5
        ]) !!}
    </div>
@overwrite
