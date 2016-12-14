<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use JWTAuth;
use App\Users;
class UserController extends Controller
{
	public $user;
	public $baseInterface;
    //
    public function __construct (UserService $userService)
    {
    	$this->user=$userService;
      
    }
    public function login(Request $request){
         
          $model=$this->user->getToken($request);
          return $model;
    }

    public function addcode(Request $request){
          $code=$this->user->addCode($request);
          return $code;
    }

    public function getUsers(Request $request){

        $model=$this->user->getUsers($request);
        return $model;
      
    }
    public function getCode(Request $request){
         $model=$this->user->getCode($request);
          return $model;
       
    }
    public function register(Request $request){
           $model=$this->user->register($request);
          return $model;
        
    }
    public function getAll(Request $request){
           $model=$this->user->getAll($request);
           return $model;
        
    }
    public function seeting(Request $request){
          $model=$this->user->seeting($request);
           return $model;
    }
}


