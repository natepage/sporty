@extends('layouts.card')

@section('sport-card-title')
    {{ trans('measurements.form.titles.body') }}
@overwrite

@section('sport-card-content')
    <div layout="column">
        <h3 class="md-headline">{{ trans('measurements.form.titles.top') }}</h3>
        <div layout="row">
            {!! Form::control('float', 'sholders', trans('measurements.fields.sholders'), $errors, [], ['flex' => '33']) !!}
            {!! Form::control('float', 'chest', trans('measurements.fields.chest'), $errors, [], ['flex' => '33']) !!}
            {!! Form::control('float', 'waist', trans('measurements.fields.waist'), $errors, [], ['flex' => '33']) !!}
        </div>
        <div layout="row">
            {!! Form::control('float', 'left_arm', trans('measurements.fields.left_arm'), $errors, [], ['flex' => '50']) !!}
            {!! Form::control('float', 'right_arm', trans('measurements.fields.right_arm'), $errors, [], ['flex' => '50']) !!}
        </div>
    </div>
    <div layout="column">
        <h3 class="md-headline">{{ trans('measurements.form.titles.bottom') }}</h3>
        <div layout="row">
            {!! Form::control('float', 'left_thigh', trans('measurements.fields.left_thigh'), $errors, [], ['flex' => '50']) !!}
            {!! Form::control('float', 'right_thigh', trans('measurements.fields.right_thigh'), $errors, [], ['flex' => '50']) !!}
        </div>
        <div layout="row">
            {!! Form::control('float', 'left_calf', trans('measurements.fields.left_calf'), $errors, [], ['flex' => '50']) !!}
            {!! Form::control('float', 'right_calf', trans('measurements.fields.right_calf'), $errors, [], ['flex' => '50']) !!}
        </div>
    </div>
@overwrite
