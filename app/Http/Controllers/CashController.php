<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CashService;
class CashController extends Controller
{
	public $cash;
	function __construct(CashService $cash){
		 $this->cash=$cash;
	}
    public function addcash(Request $request){
    	$model=$this->cash->addcash($request);
    	return $model;
    }

    public function getcash(Request $requset){
        $model=$this->cash->getcash($requset);
        return $model;
    }

    public function setcash(Request $requset){
        $model=$this->cash->setcash($requset);
        return $model;
    }  
}
