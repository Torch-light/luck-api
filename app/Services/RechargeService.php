<?php 

namespace App\Services;
use App\Helps\Utils;
use App\Interfaces\BaseRechargeInterface;
use App\Interfaces\BaseUserInterface;
use App\Services\EventService;
/**
* 
*/
class RechargeService 
{
	protected $recharge;
	protected $utils;
	protected $user;
	protected $users;
	protected $event;
	function __construct(BaseRechargeInterface $recharge,
							Utils $utils,
							BaseUserInterface $user,
							EventService $event
							)
	{
		$this->recharge=$recharge;
		$this->utils=$utils;
		$this->user=$user;
		$this->event=$event;		
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

		$model=$this->recharge->create($arr);
		if($model){
			$this->event->rechange($arr['uid'],$arr['mark']);
		 	return $this->utils->successMessage('提交成功,请等待审核');
		}else{
			return $this->utils->errorMessage('提交失败');
		}
	}

	public function find($obj){
		
		$model=$this->recharge->find($obj);
		if(empty($model)){
			return $this->utils->successMessage('无待审核订单');
		}else{
			return $this->utils->successMessage('获取成功',$model);
		}
	}

	public function update($obj){
		$model=$this->recharge->update($obj);
		if($model){
			$bol=$this->user->updatePoints($obj);
			if($bol){
				return $this->utils->successMessage('充值成功');
			}
		}else{
			return $this->utils->errorMessage('失败');
		}
	}
}