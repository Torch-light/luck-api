<?php 

namespace App\Services;
use App\Helps\Utils;
use App\Interfaces\BaseRechargeInterface;
use App\Interfaces\BaseUserInterface;
use App\Interfaces\BaseCashInterface;
use App\Services\EventService;
/**
* 
*/
class RechargeService 
{
	protected $recharge;
	protected $utils;
	protected $user;
	protected $cash;
	protected $event;
	function __construct(BaseRechargeInterface $recharge,
							Utils $utils,
							BaseUserInterface $user,
							EventService $event,
							BaseCashInterface $cash
							)
	{
		$this->recharge=$recharge;
		$this->utils=$utils;
		$this->user=$user;
		$this->event=$event;
		$this->cash=$cash;		
	}

	public function create($obj){
		if(empty($obj)){
			return $this->utils->errorMessage('数据不能为空');
		};
		$arr=array('name' =>$obj->get('name'),
					'money'=>$obj->get('money'),
					'uid'=>$obj->get('uid'),
					'mark'=>$obj['mark'],
		);
		$rechange=$this->recharge->getRechange($obj);
		if(empty($rechange)){
			return $this->utils->errorMessage('提交失败,还有待审核充值');
		}
		$model=$this->recharge->create($arr);
		if($model){
				$_model=array('id'=>$model['id'],
						'money'=>$model['money'],
						'name'=>$model['name'],
						'uid'=>$model['uid'],
						'created_at'=>$model['created_at']);
			$this->event->rechange($model,$arr['mark']);
		 	return $this->utils->successMessage('提交成功,请等待审核',$model);
		}else{
			return $this->utils->errorMessage('提交失败');
		}
	}

	public function find($obj){
		if($obj['type']=='rechange'){
		$model=$this->recharge->find($obj);
		}
		else if($obj['type']=='cash'){
		 $model=$this->cash->getall($obj);
		}
		if(empty($model)){
			return $this->utils->successMessage('无待审核');
		}else{
			return $this->utils->successMessage('获取成功',$model);
		}
	}

	public function update($obj){
		$model=$this->recharge->update($obj);
		if($model){
			$bol=$this->user->updatePoints($obj);
			if($bol){
				$this->event->rechange($bol,$obj['uid']);
				return $this->utils->successMessage('充值成功');
			}
		}else{
			return $this->utils->errorMessage('失败');
		}
	}

	public function getRechange($obj){
		$model=$this->recharge->getRechange($obj);
		if($model){
			return $this->utils->successMessage('获取成功',$model);
		}else{
			
			return $this->utils->errorMessage('获取失败',false);
		}
		return $model;
	}

	public function delChange($obj){

		$model=$this->recharge->delChange($obj);
		if($model){
			return $this->utils->successMessage('删除成功');
		}else{
			
			return $this->utils->errorMessage('删除失败',false);
		}
	}
}