<?php  
/**
* 
*/
namespace App\Interfaces;
use App\Interfaces\BaseActionInterface;
use App\Model\Action;
class ActionInterface implements BaseActionInterface
{
	
	function __construct()
	{
        
	}


    public function getModel()
    {
       
    	 return Action::class;
    }
    public function find($obj)
    {
            $dd=$this->getModel();
            $date=$dd::where('phone',$obj)->first();
            return $date;
    }

    public function delete($obj){
       
    }
    public function create($obj){
       $re=new Action;
        $re->name=$obj['name'];
        $re->num=$obj['num'];
        $re->money=$obj['money'];
        $re->action=$obj['action'];
        $re->multiple=$obj['multiple'];
        $bol=$re->save();
        return $bol;
    }
    public function update($obj){
       
    }
}
