var app = angular.module("client", []);
app.controller('liste_client', function($scope,$http) {
	$scope.getRep = function(){
		
		$http.get('http://localhost:8080/WebService/webresources/ClientService/Clients').then(function(response){
			$scope.clients = response.data;
			$window.sessionStorage.setItem("clients",JSON.stringify($scope.clients));
		})

	}
	
})

