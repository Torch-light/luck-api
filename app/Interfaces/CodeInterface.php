<?php  
namespace App\Interfaces;

use App\Interfaces\BaseUserInterface;
use App\Model\Code;
/**
* 
*/
class CodeInterface implements BaseCodeInterface
{
	

	function __construct()
	{
		
		# code...
	}
	public function getModel(){
		return Code::class;

	}

	public function find($obj)
	{
			$dd=$this->getModel();
			$date=$dd::where('phone',$obj)->first();
			return $date;
	}

	public function delete($obj)
	{

	}

	public function update($obj)
	{
		$bol=$this->getModel()::where('phone',$obj['phone'])
				  ->update(['code'=>$obj['code'],
							'iscode'=>$obj['iscode']]);
					return $bol;
	}

	public function create($code,$obj)
	{
		$name=$obj['name'];
		foreach ($code as $value) {
			$this->getModel()::create(['name'=>$name,'code'=>$value]);
		}
		return true;
	}

	public function getCode($obj)
	{
        $model=$this->getModel()::where(['name'=>$obj['name'],'iscode'=>0])
        ->get(['code']);
        return $model;
    }

    public function getOnceCode($obj)
    {
    	 $model=$this->getModel()::where(['code'=>$obj['code'],'iscode'=>0])
        ->first(['code','name']);
        return $model;
    }

    public function setOnceCode($obj)
    {
    	 $model=$this->getModel()::where(['code'=>$obj['code']])
    	 			 ->update(['iscode'=>1]);
    	 return $model;
    }

}