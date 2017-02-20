<?php

namespace App\Providers;

use Collective\Html\FormBuilder;
use Illuminate\Support\ServiceProvider;

class HtmlMacrosServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerFormControl();
        $this->registerImgControl();
        $this->registerSelectControl();
    }

    private function registerFormControl()
    {
        FormBuilder::macro('control', function(
            $type,
            $name,
            $label,
            $errors,
            $attributes = [],
            $ctnAttr = [],
            $errorName = null,
            $value = null
        ){
            $errorName = $errorName !== null ? $errorName : $name;

            $input = in_array($type, ['textarea']) ?
                     call_user_func_array(['Form', $type], [$name, $value, $attributes]) :
                     call_user_func_array(['Form', 'input'], [$type, $name, $value, $attributes]);

            return sprintf(
                '<md-input-container flex %s %s>
                    <label>%s</label>
                    %s
                    %s
                </md-input-container>',
                call_user_func_array(['Html', 'attributes'], [$ctnAttr]),
                $errors->has($errorName) ? 'md-is-error="true"' : '',
                $label,
                $input,
                $errors->first(
                    $errorName,
                    '<div class="md-input-message-animation" style="opacity: 1; margin-top: 0;">:message</div>'
                )
            );
        });
    }

    private function registerSelectControl()
    {
        FormBuilder::macro('mdSelect', function(
            $name,
            $model,
            $label,
            $errors,
            $list = [],
            $attributes = [],
            $ctnAttr = [],
            $errorName = null
        ){
            $errorName = $errorName !== null ? $errorName : $name;

            $select = sprintf(
                '<md-select name="%s" ng-model="%s" %s>',
                $name,
                $model,
                call_user_func_array(['Html', 'attributes'], [$attributes])
            );

            foreach ($list as $value => $display) {
                $select .= sprintf('<md-option value="%s">%s</md-option>', $value, $display);
            }

            $select .= '</md-select>';

            return sprintf(
                '<md-input-container flex %s %s>
                    <label>%s</label>
                    %s
                    %s
                </md-input-container>',
                call_user_func_array(['Html', 'attributes'], [$ctnAttr]),
                $errors->has($errorName) ? 'md-is-error="true"' : '',
                $label,
                $select,
                $errors->first(
                    $errorName,
                    '<div class="md-input-message-animation" style="opacity: 1; margin-top: 0;">:message</div>'
                )
            );
        });
    }

    private function registerImgControl()
    {
        FormBuilder::macro('images', function($errors, $ctnAttr = []){
            return sprintf(
                '<md-input-container class="md-block" %s %s>
                    <label>%s</label>
                    <lf-ng-md-file-input name="images" 
                                         lf-files="images" 
                                         lf-maxcount="3" 
                                         lf-filesize="10MB" 
                                         lf-totalsize="20MB" 
                                         lf-mimetype="image/*" 
                                         lf-drag-and-drop-label="%s"
                                         lf-browse-label="%s"
                                         lf-remove-label="%s"
                                         multiple 
                                         drag 
                                         preview></lf-ng-md-file-input>
                    <div ng-messages="form.images.$error">
                        <div ng-message="maxcount">Too many files.</div>
                        <div ng-message="filesize">File size too large.</div>
                        <div ng-message="totalsize">Total size too large.</div>
                        <div ng-message="mimetype">Mimetype error.</div>
                        %s
                    </div>
                </md-input-container>
                <input type="file" ng-model="images" name="images[]" multiple style="display: none;">',
                $errors->has('images') ? 'md-is-error="true"' : '',
                call_user_func_array(['Html', 'attributes'], [$ctnAttr]),
                trans('measurements.fields.images'),
                trans('measurements.form.images.labels.drap_and_drop'),
                trans('measurements.form.images.labels.browse'),
                trans('measurements.form.images.labels.remove'),
                $errors->first(
                    'images',
                    '<div class="md-input-message-animation" style="opacity: 1; margin-top: 0;">:message</div>'
                )
            );
        });
    }
}
