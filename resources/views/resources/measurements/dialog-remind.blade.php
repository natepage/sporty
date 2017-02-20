<div id="remind-measurements" ng-init="remindMeasurements($event)"
     ask-title="{{ trans('measurements.ask.remind.title') }}"
     ask-content="{{ trans('measurements.ask.remind.content.' . session('need_measurements')) }}"
     ask-ok="{{ trans('measurements.ask.remind.ok') }}"
     ask-cancel="{{ trans('measurements.ask.remind.cancel') }}"
     ask-url="{{ route('measurements.create') }}"
     ask-remove-remind-url="{{ route('measurements.remove.remind') }}"
></div>
