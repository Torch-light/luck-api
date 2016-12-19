<?php 

namespace App\Services;
use App\Helps\Utils;
use App\Interfaces\BaseCashInterface;
use App\Interfaces\BaseUserInterface;
use App\Services\EventService;

/**
* 
*/
class CashService 
{
	protected $utils;
	protected $cash;
	protected $user;
	protected $event;
	function __construct(BaseCashInterface $cash,
							BaseUserInterface $user,
							EventService $event,
							Utils $utils)
	{
		$this->utils=$utils;
		$this->cash=$cash;	
		$this->user=$user;	
		$this->event=$event;
	}

	public function addcash($obj){
		if(empty($obj->get('money'))){
			return $this->utils->errorMessage('缺少参数');
		}
		$money=$this->user->onceData($obj['id'],'points');
		if($obj->get('money')>$money[0]->points){
			return $this->utils->errorMessage('余额不足');
		}
		$bol=$this->user->updatePoints($obj,2);
		if($bol){
		
		$model=$this->cash->addcash($obj);
		}else{
			return $this->utils->errorMessage('失败');
		}

		if(empty($model)){
			return $this->utils->errorMessage('获取失败');
		}else{
			$this->event->cash($model,$obj['mark']);
			return $this->utils->successMessage('提现成功',$model);
		}
	}

	public function getcash($obj){
		$model=$this->cash->getall($obj);
		return $this->utils->successMessage('成功',$model);
		
	}

	public function setcash($obj){
		$model=$this->cash->setcash($obj);
		if($model){
		$this->event->cash(true,$obj['userId']);		
		return $this->utils->successMessage('成功',$model);
		}else{
		return $this->utils->errorMessage('失败',$model);

		}
		
	}
}