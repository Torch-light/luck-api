<?php 

namespace App\Services;
use App\Helps\Utils;
use App\Interfaces\BaseActionInterface;
use App\Interfaces\BaseUserInterface;
use App\Services\EventService;

/**
* 
*/
class ActionService 
{
	protected $action;
	protected $utils;
	protected $user;
	function __construct(BaseActionInterface $action,
						 BaseUserInterface $user,
							EventService $event,	
							Utils $utils)
	{
		$this->action=$action;
		$this->utils=$utils;
		$this->user=$user;	
		$this->event=$event;	
	}

	public function create($obj){

		if(empty($obj)){
			return $this->utils->errorMessage('数据不能为空');
		};
		$point=$this->user->deductPoints($obj);
		if(!$point){
			return $this->utils->errorMessage('下注失败');
		}
		$model=$this->action->create($obj);
		if($model&&$point){
			$this->event->broadcast($obj);

		 	return $this->utils->successMessage('下注成功',$model);
		}else{
			return $this->utils->errorMessage('下注失败');
		}
	}
	public function getAll($obj){
		if(empty($obj)){
			return false;
		}
		$ac=$this->action->getAll($obj);
		return $this->utils->successMessage('成功',$ac);
	}

	public function delaction($obj){
		if(empty($obj)){
			return false;
		}
		$data=$this->action->find($obj['num']);
		$arr=array('uid'=>$obj['id'],'money'=>$data['money']);
		$bol=$this->user->updatePoints($arr);
		if($bol){
			$this->action->delaction($obj);
		 return $this->utils->successMessage('删除成功',$bol);
		}else{
			 return $this->utils->errorMessage('删除失败',$del);
		}
	}

	public function getaction(){
		$data=$this->action->getaction();
		return $this->utils->successMessage('成功',$data);	
	}

	public function event(){
		     
	}
}