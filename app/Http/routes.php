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
			

		});
});

// Route::get('/event', function(){
//     $user = array(1,2);
//     $message = array(
//         'id'  => 1,
//         'title'=>'您的店铺有一条新销售单',
//         'content' => '您的店铺有一条新销售单，单号1000000',
//         'message_type_id' => 1,
//         'status'           => 0,
//         'url'              => 'https://youshui.ren',
//         'created_at'        => date('Y-m-d H:i:s')
//     );
//     //广播的频道
//     //我们以店铺id来标识频道，这样前端用户页面也根据店铺id标识来收听自己店铺频道，就能做到店铺广播消息消息只能广播到本店铺用户
//     //$channel = 'channel-' . Session::get('shop')->id;
//     $channel = 'channel-system-0';

//     Event::fire(new \App\Events\EventBoradcast($user,$message,$channel));
//     return "hello world";
// });

