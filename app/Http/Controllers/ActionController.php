<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\ActionService;
class ActionController extends Controller
{
	public $action;
	function __construct(ActionService $action){
		$this->action=$action;
	}
    public function action(Request $request){
    	$model=$this->action->create($request);
    	return $model;
    }

    public function getIndexNum(Request $request){
    	$model=$this->action->getAll($request);
    	return $model;
    }
}
