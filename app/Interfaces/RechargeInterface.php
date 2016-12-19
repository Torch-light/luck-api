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
                     $date=$dd::where(['deleted_at'=>null,'ispass'=>false])
                     ->orderBy('created_at','desc')
                     ->get(['id','uid','money','name','created_at']);
                break;
                case 2:
                     $date=$dd::where(['deleted_at'=>null,'mark'=>$obj['id'],'ispass'=>false])
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
        $re->ispass=false;
        $bol=$re->save();
        if($bol){
            return $re;
        }
        return $bol;
    }
    public function update($obj){

         $re=$this->getModel()::find($obj->get('id'));
         $re->ispass=1;
         $bol=$re->save();
         return $bol;
    }
    public function getRechange($obj){

          $re=$this->getModel()::where(['uid'=>$obj['id'],'deleted_at'=>NULL,'ispass'=>false])->get(['id','mark','money','created_at','ispass']);
          return $re;
    }

    public function delChange($obj){
         $re=$this->getModel()::find($obj->get('rechangId'));
         $re->deleted_at=date('Y-m-d h:i:s');
         $bol=$re->save();
         return $bol;
    }
}
