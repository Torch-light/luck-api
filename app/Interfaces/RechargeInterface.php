<?php  
/**
* 
*/
namespace App\Interfaces;
use App\Interfaces\BaseRechargeInterface;
use App\Model\Recharge;
class RechargeInterface implements BaseRechargeInterface
{
	
	function __construct()
	{
        
	}


    public function getModel()
    {
       
    	 return Recharge::class;
    }
    public function find($obj)
    {
            $dd=$this->getModel();
            $date=$dd::where('deleted_at',null)
            ->orderBy('created_at','desc')
            ->get(['id','uid','money','name','created_at']);
            return $date;
    }

    public function delete($obj){
       
    }
    public function create($obj){
       $re=new Recharge;
        $re->name=$obj['name'];
        $re->money=$obj['money'];
        $re->uid=$obj['uid'];
        $bol=$re->save();
        return $bol;
    }
    public function update($obj){
         $re=$this->getModel()::find($obj['id']);
         $re->deleted_at=date("Y-m-d H:i:s");
         $bol=$re->save();
         return $bol;
    }
}
