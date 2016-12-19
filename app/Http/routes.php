<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


$api = app('api.router');
$api->version('v1', ['namespace'=>'App\Http\Controllers','middleware' => 'cors'], function ($api) {
		$api->post('/login','UserController@login');
		$api->post('/register','UserController@register');
		// $api->get('/event','ActionController@event');
		$api->group(['middleware' =>'auth'],function($api){
			$api->post('/addcode','UserController@addcode');
			$api->post('/addbets','ActionController@action');
			$api->post('/recharge','RechargeController@recharge');
			$api->get('/reviewed','RechargeController@reviewed');
			$api->post('/submit','RechargeController@submit');
			$api->get('/users','UserController@getUsers');
			$api->get('/getCode','UserController@getCode');
			$api->get('/getHistory','CathecticController@getPlay');
			$api->get('/getAnarchy','SystemController@getAnarchy');
			$api->get('/getNum','ActionController@getIndexNum');
			$api->get('/allusers','UserController@getAll');
			$api->post('/seeting','UserController@seeting');
			$api->post('/delaction','ActionController@delaction');
			$api->get('/action','ActionController@getaction');
			$api->post('/cash','CashController@addcash');
			$api->get('/getcash','CashController@getcash');
			$api->post('/setcash','CashController@setcash');
			$api->get('/getRechange','RechargeController@getRechange');
			$api->post('/delChange','RechargeController@delChange');
			

		});
});

