<?php 

namespace App\Services;
use App\Helps\Utils;
use App\Interfaces\BaseSystemInterface;

/**
* 
*/
class SystemService 
{
	protected $utils;
	protected $service;
	function __construct(
						 BaseSystemInterface $stysem,
							Utils $utils)
	{
		$this->utils=$utils;
		$this->service=$stysem;		
	}

	public function getAnarchy(){
		$model=$this->service->find();

		if(empty($model)){
			return $this->utils->errorMessage('失败');
		}else{
			$arr=array('updateNum'=>$model['updateNum'],
				'updatePoints'=>$model['updatePoints'],
				'time'=>date('i'));
			return $this->utils->successMessage('成功',$arr);
		}
	}

}