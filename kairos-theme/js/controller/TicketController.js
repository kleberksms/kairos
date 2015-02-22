(function(){

  var app = angular.module('newTicket', []);

  app.controller('FollowersController',function(){
  	this.followers = followers;

  });

  var followers = [
	{
		username: 'example name',
		owner	: true,
		email 	: true,
		admin 	: true,
		only	: true,
		photo	: ''
	},
	{
		username: 'example name 1',
		email 	: true,
		admin 	: false,
		only	: true,
		photo	: ''
	},
	{
		username: 'example name 2',
		email 	: false,
		admin 	: false,
		only	: true,
		photo	: ''
	},
	{
		username: 'example name 3',
		email 	: true,
		admin 	: false,
		only	: true,
		photo	: ''
	},
  ];
  
})();