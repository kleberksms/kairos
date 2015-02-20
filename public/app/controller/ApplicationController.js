(function () {
	
	var module = angular.module("angular-test", ["google-maps"]);
	
	module.controller("ApplicationController", function ($scope, $http) {
				
		// default location
		$scope.center = {
			latitude: 25.75533,
			longitude: -80.21981
		};
		
		$scope.zoom = 12;
		
		$scope.markers = [];
		
		$scope.addMarkers = function (obj) {
		  
            angular.forEach(obj, function(value){
                //console.log(value.longitude)
                //$scope.markers.push(value);
                $scope.markers.push({
    				latitude: parseFloat(value.lat),
    				longitude: parseFloat(value.lon)
    			});
            })
            
            console.log($scope.markers)
		};
        
        $scope.increaseZoom = function(){
            $scope.zoom = parseInt($scope.zoom+1);
            //console.log($scope.zoom)
        }
        
        $scope.decreaseZoom = function(){
            $scope.zoom = parseInt($scope.zoom-1);
            //console.log($scope.zoom)
        }
        
        $scope.getMarkers = function(){
            $http({
                url: '/ajax/get-items',
                method: 'GET'
            }).success(function(data, status, headers, config) {
                $scope.addMarkers(data);
            })
        }
	});
}());
