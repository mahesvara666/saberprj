var aeonApp = angular.module('Aeon', ['ngResource','restangular']);

aeonApp.config(function(RestangularProvider) {
  RestangularProvider.setBaseUrl('api/v1/');
});

aeonApp.controller('StaffController',function($scope, Restangular)
{
	Restangular.all('staff').getList().then(function(users) {
  		// returns a list of users
 		$scope.user = users; // first Restangular obj in list: { id: 123 }
	});
});
