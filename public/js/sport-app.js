angular
    .module('SportApp', ['ngMaterial', 'ngMessages'])
    .directive('notify', function($mdToast){
        return {
            link: function(scope, element, attr){
                element.css({
                    opacity: 0
                });

                $mdToast.show(
                    $mdToast.simple()
                        .textContent(element.text())
                        .position('top right')
                        .parent(element.parent())
                        .action('OK')
                        .hideDelay(10000)
                );
            }
        };
    })
    .controller('SportCtrl', function($scope, $mdSidenav, $mdDialog, $http){
        $scope.toggleSideNav = function($id){
            $mdSidenav($id).toggle();
        };
        $scope.back = function(){
            window.history.back();
        };
        $scope.remindMeasurements = function(e){
            var attrs = angular.element(document.querySelector('#remind-measurements'))[0].attributes;

            var confirm = $mdDialog.confirm()
                .title(attrs['ask-title'].value)
                .textContent(attrs['ask-content'].value)
                .targetEvent(e)
                .ok(attrs['ask-ok'].value)
                .cancel(attrs['ask-cancel'].value);

            $mdDialog.show(confirm).then(function() {
                $scope.removeRemindMeasurements(attrs['ask-remove-remind-url'].value, attrs['ask-url'].value);
            }, function(){
                $scope.removeRemindMeasurements(attrs['ask-remove-remind-url'].value);
            });
        };
        $scope.removeRemindMeasurements = function(url, successUrl){
            console.log(successUrl);

            var successUrl = successUrl || '';

            $http.get(url).then(function(){
                console.log(successUrl);
                if(successUrl !== ''){
                    window.location.href = successUrl;
                }
            });
        };
    })
    .controller('loginCtrl', function($scope){
        $scope.remember = false;
    })
    .controller('measurementsCtrl', function($scope, $mdDialog){
        $scope.feeling = '';

        $scope.askDestroy = function(e, id){
            var attrs = angular.element(document.querySelector('#btn-ask-detroy-' + id))[0].attributes;

            var confirm = $mdDialog.confirm()
                .title(attrs['ask-title'].value)
                .textContent(attrs['ask-content'].value)
                .targetEvent(e)
                .ok(attrs['ask-ok'].value)
                .cancel(attrs['ask-cancel'].value);

            $mdDialog.show(confirm).then(function() {
                $scope.deleteMeasurement(id);
            });
        };

        $scope.deleteMeasurement = function(id){
            var form = angular.element(document.querySelector('#form-destroy-' + id))[0];

            form.submit();
        };
    })
    .controller('workoutCtrl', function($scope, $mdDialog, $compile){
        $scope.level_id = null;
        $scope.translations = window.translations;
        $scope.series = window.series;

        $scope.setLevel = function(){
            window.location.href = '/sport-management/public/workout/set/level/' + $scope.level_id;
        };

        $scope.addSerie = function(id){
            var container = angular.element(document.querySelector('#series-container-' + id));
            var trans = $scope.translations;

            var newSerie = '<md-input-container flex>' +
                                '<label>' + trans.series + '</label>' +
                                '<input type="number" name="series[' + id + '][series][]" required>' +
                           '</md-input-container>';

            container.append($compile(newSerie)($scope));
        };

        $scope.askDestroy = function(e, id){
            var attrs = angular.element(document.querySelector('#btn-ask-detroy-' + id))[0].attributes;

            var confirm = $mdDialog.confirm()
                .title(attrs['ask-title'].value)
                .textContent(attrs['ask-content'].value)
                .targetEvent(e)
                .ok(attrs['ask-ok'].value)
                .cancel(attrs['ask-cancel'].value);

            $mdDialog.show(confirm).then(function() {
                $scope.deleteWorkout(id);
            });
        };

        $scope.deleteWorkout = function(id){
            var form = angular.element(document.querySelector('#form-destroy-' + id))[0];

            form.submit();
        };
    })
    .controller('levelCtrl', function($scope, $mdDialog, $compile){
        $scope.steps = window.steps;
        $scope.exercises = window.exercises;
        $scope.translations = window.translations;
        $scope.nbStep = 1;

        $scope.askDestroy = function(e, id){
            var attrs = angular.element(document.querySelector('#btn-ask-detroy-' + id))[0].attributes;

            var confirm = $mdDialog.confirm()
                .title(attrs['ask-title'].value)
                .textContent(attrs['ask-content'].value)
                .targetEvent(e)
                .ok(attrs['ask-ok'].value)
                .cancel(attrs['ask-cancel'].value);

            $mdDialog.show(confirm).then(function() {
                $scope.deleteLevel(id);
            });
        };

        $scope.deleteLevel = function(id){
            var form = angular.element(document.querySelector('#form-destroy-' + id))[0];

            form.submit();
        };

        $scope.addStep = function(){
            var container = angular.element(document.querySelector('#steps-container'));
            var nbStep = $scope.nbStep++;
            var trans = $scope.translations;

            var stepIds = Object.keys($scope.steps);
            var maxId = Math.max(...stepIds) + 1;

            var newStep =
                '<md-card class="steps-line">' +
                    '<md-card-content layout="column">' +
                        '<div layout="row" flex>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.exercise_id + '</label>' +
                                '<md-select name="steps[-' + nbStep + '][exercise_id]" ng-model="steps[-' + nbStep + '].exercise_id" ng-required="true">' +
                                    '<md-option ng-repeat="exercise in exercises" value="{{exercise.id}}">' +
                                        '{{exercise.name}}' +
                                    '</md-option>' +
                                '</md-select>' +
                            '</md-input-container>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.nb_series + '</label>' +
                                '<input type="number" name="steps[-' + nbStep + '][nb_series]" ng-model="steps[-' + nbStep + '].nb_series" required>' +
                            '</md-input-container>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.nb_repetitions + '</label>' +
                                '<input type="number" name="steps[-' + nbStep + '][nb_repetitions]" ng-model="steps[-' + nbStep + '].nb_repetitions" required>' +
                            '</md-input-container>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.pace.name + '</label>' +
                                '<md-select name="steps[-' + nbStep + '][pace]" ng-model="steps[-' + nbStep + '].pace" required>' +
                                    '<md-option value="slow">' + trans.pace.slow + '</md-option>' +
                                    '<md-option value="normal">' + trans.pace.normal + '</md-option>' +
                                    '<md-option value="fast">' + trans.pace.fast + '</md-option>' +
                                '</md-select>' +
                            '</md-input-container>' +
                        '</div>' +
                        '<div layout="row" flex>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.rest_between + '</label>' +
                                '<input type="number" name="steps[-' + nbStep + '][rest_between]" ng-model="steps[-' + nbStep + '].rest_between" required>' +
                            '</md-input-container>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.rest_between_unit + '</label>' +
                                '<md-select name="steps[-' + nbStep + '][rest_between_unit]" ng-model="steps[-' + nbStep + '].rest_between_unit" required>' +
                                    '<md-option value="sec">sec</md-option>' +
                                    '<md-option value="min">min</md-option>' +
                                '</md-select>' +
                            '</md-input-container>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.rest_after + '</label>' +
                                '<input type="number" name="steps[-' + nbStep + '][rest_after]" ng-model="steps[-' + nbStep + '].rest_after" required>' +
                            '</md-input-container>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.rest_after_unit + '</label>' +
                                '<md-select name="steps[-' + nbStep + '][rest_after_unit]" ng-model="steps[-' + nbStep + '].rest_after_unit" required>' +
                                    '<md-option value="sec">sec</md-option>' +
                                    '<md-option value="min">min</md-option>' +
                                '</md-select>' +
                            '</md-input-container>' +
                            '<md-input-container flex>' +
                                '<label>' + trans.order + '</label>' +
                                '<input type="number" name="steps[-' + nbStep + '][order]" ng-model="steps[-' + nbStep + '].order" required>' +
                            '</md-input-container>' +
                        '</div>' +
                        '<div layout="row" flex>' +
                            '<md-button id="btn-remove-step-' + maxId + '" ng-click="removeStep('+ maxId +')" class="md-warn" flex>' + trans.actions.remove +'</md-button>' +
                        '</div>' +
                    '</md-card-content>' +
                '</md-card>';

            container.append($compile(newStep)($scope));
        };

        $scope.removeStep = function(id){
            var btn = angular.element(document.querySelector('#btn-remove-step-' + id));

            btn.parent().parent().remove();
        };
    })
;
