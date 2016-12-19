<?php  
namespace App\Interfaces;

use App\Interfaces\BaseCashInterface;
use App\Model\Cash;
/**
* 
*/
class CashInterface implements BaseCashInterface
{
	

	function __construct()
	{
		
		# code...
	}
	public function getModel(){
		return Cash::class;

	}

	public function addcash($obj)
	{
		$data=$this->getModel()::create(['uid'=>$obj['id'],
									'mark'=>$obj['mark'],
									'money'=>$obj['money'],
									'cashtype'=>$obj['cashtype'],
									'number'=>$obj['number'],
									'name'=>$obj['name']]);
		return $data;
	}

	public function delete($obj)
	{

	}

	public function update($obj)
	{
		
	}

	public function getall($obj)
	{
		if($obj['role_id']>5){	
		$data=$this->getModel()::where(['uid'=>$obj['id'],'deleted_at'=>NUll])->
		orderBy('id','desc')->get(['name','number','id','created_at','cashtype','mark','money','uid']);
		}else if($obj['role_id']==2){
		$data=$this->getModel()::where(['mark'=>$obj['id'],'deleted_at'=>NUll])->orderBy('id','desc')->get(['name','number','id','created_at','cashtype','mark','money','uid']);
		}else{
		$data=$this->getModel()::where(['deleted_at'=>NUll])->orderBy('id','desc')->get(['name','number','id','created_at','cashtype','mark','money','uid']);	
		};
		return $data;
	}

	public function setcash($obj){
			$model=$this->getModel()::find($obj['cashId']);
			$model->deleted_at=date("Y-m-d H:i:s");
			return $model->save();
	}

}