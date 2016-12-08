<?php  
/**
* 
*/
namespace App\Interfaces;
use App\Interfaces\BaseActionInterface;
use App\Model\System;
class SystemInterface implements BaseSystemInterface
{
	
	function __construct()
	{
        
	}


    public function getModel()
    {
       
    	 return System::class;
    }
    public function find()
    {
            $dd=$this->getModel();
            $date=$dd::where('id',0)->first(['updateNum','updatePoints']);
            return $date;
    }

    public function delete($obj){
       
    }
    public function create($obj){
      
    }
    public function update($obj){
       
    }
}
