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
            $date=$dd::where('id',$obj)->first();
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
        $re->mark=$obj['mark'];
        $re->save();
         return $re;
    }
    public function update($obj){
       
    }

    public function getAll($obj){
         $dd=$this->getModel();
         switch ($obj['role_id']) {
             case 0:
             case 1:
                 $date=$dd::where('num',$obj['num'])
        ->orderBy('created_at','desc')
        ->get(['id','name','num','action','money','created_at']);
                 break;
             case 2:
                 $date=$dd::where(['num'=>$obj['num'],'mark'=>$obj['id']])
        ->orderBy('created_at','desc')
        ->get(['id','name','num','action','money','created_at']);
                 break;
             
             default:
                $date=$dd::where(['num'=>$obj['num'],'mark'=>$obj['mark']])
        ->orderBy('created_at','desc')
        ->get(['id','name','num','action','money','created_at']);
                 break;
         }
        
        return $date;
    }

    public function delaction($obj){
          $de=$this->getModel()::find($obj['num'])->delete();
          return $de;
    }

    public function getaction(){
         $dd=$this->getModel();
        $date=$dd::where([])
        ->limit(10)
        ->orderBy('created_at','desc')
        ->get(['action','money','multiple','num','created_at','prize']);
        return $date;
    }
}
