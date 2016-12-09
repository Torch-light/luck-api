<?php 

namespace App\Services;
use App\Helps\Utils;
use App\Interfaces\BaseActionInterface;
use App\Interfaces\BaseUserInterface;

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
							Utils $utils)
	{
		$this->action=$action;
		$this->utils=$utils;
		$this->user=$user;		
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
		 	return $this->utils->successMessage('下注成功',$point);
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

}