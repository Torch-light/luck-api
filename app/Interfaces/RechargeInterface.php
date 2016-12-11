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
        
            switch($obj['role_id']){
                case 0:
                case 1:
                     $date=$dd::where('deleted_at',null)
                     ->orderBy('created_at','desc')
                     ->get(['id','uid','money','name','created_at']);
                break;
                case 2:
                     $date=$dd::where(['deleted_at'=>null,'mark'=>$obj['id']])
                     ->orderBy('created_at','desc')
                     ->get(['id','uid','money','name','created_at']);
                break;
            };
           
            return $date;
    }

    public function delete($obj){
       
    }
    public function create($obj){
       $re=new Recharge;
        $re->name=$obj['name'];
        $re->money=$obj['money'];
        $re->uid=$obj['uid'];
        $re->mark=$obj['mark'];
        $bol=$re->save();
        return $bol;
    }
    public function update($obj){

         $re=$this->getModel()::find($obj->get('id'));
         $re->deleted_at=date("Y-m-d H:i:s");
         $bol=$re->save();
         return $bol;
    }
}
