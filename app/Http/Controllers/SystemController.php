<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SystemService;
class SystemController extends Controller
{
    //
    public $system;
    function __construct(systemService $system){
    	$this->system=$system;
    }

   	public function getAnarchy(){
   		$model=$this->system->getAnarchy();
   		return $model;
   	}
}
