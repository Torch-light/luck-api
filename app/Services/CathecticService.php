<?php 

namespace App\Services;
use App\Helps\Utils;
use App\Interfaces\BaseCathecticInterface;

/**
* 
*/
class CathecticService 
{
	protected $cathectic;

	function __construct(BaseCathecticInterface $cathectic,
			Utils $utils
						)
	{
		$this->cathectic=$cathectic;
		$this->utils=$utils;
			
	}

	public function play($obj){
		if(empty($obj)){
			return false;
		};
		$data=$this->cathectic->find($obj);
		if(!empty($data)){
			return $this->utils->successMessage('成功',$data);
		}else{
			return $this->utils->errorMessage('失败');
		}

	}

}