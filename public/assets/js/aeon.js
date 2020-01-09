var AeonApplication = angular.module('Aeon',['ngAnimate','restangular']);

AeonApplication.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('api/v1/');
});

AeonApplication.controller('AeonMondayEventController', function($scope, Restangular)
{
	
});