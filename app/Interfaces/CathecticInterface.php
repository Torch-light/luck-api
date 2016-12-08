<?php  
namespace App\Interfaces;

use App\Interfaces\BaseCathecticInterface;
use App\Model\Cathectic;
/**
* 
*/
class CathecticInterface implements BaseCathecticInterface
{
	

	function __construct()
	{
		
		# code...
	}
	public function getModel(){
		return Cathectic::class;

	}

	public function find($obj)
	{
			$dd=$this->getModel();
			$date=$dd::orderBy('id','desc')->first();
			// $date=$dd::where('created_at','>=',$obj['stime'])
			// ->first();
			
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

	public function create($code)
	{
		$name=$obj['name'];
		foreach ($code as $value) {
			$this->getModel()::create(['name'=>$name,'code'=>$value]);
		}
		return true;
	}



}