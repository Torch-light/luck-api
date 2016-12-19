<?php  
/**
* 
*/
namespace App\Interfaces;
use App\Interfaces\BaseUserInterface;
use App\Model\Users;
use Crypt;
class UserInterface implements BaseUserInterface
{
	
	function __construct()
	{
        
	}


    public function getModel()
    {
       
    	 return Users::class;
    }
    public function find($obj)
    {
            $dd=$this->getModel();
            $data=$dd::where('name',$obj['name'])->first();
            return $data;
    }

    public function delete($obj){
       
    }
    public function create($obj){
       
    }
    public function updatePoints($obj,$type=1){
       
            if($type==1){
            $model=$this->getModel()::find($obj['uid']);
            $model->points=$model->points+$obj['money'];
            }else{
            $model=$this->getModel()::find($obj['id']);
            $model->points=$model->points-$obj['money'];    
            }
            $bol=$model->save();
            return $bol;
        
    }

     public function deductPoints($obj){
       
            $model=$this->getModel()::find($obj['id']);
            if($model->points>=$obj['money']){
            $model->points=$model->points-$obj['money'];
            }else{
                return false;
            }
            $bol=$model->save();
            if($bol){
                return $model->points?$model->points:'0.0';
            }else{
                return false;
            }
        
    }
    public function getUsers($obj){
        
        $model=$this->getModel()::where('id',$obj['id'])->first(['name','points']);
        return $model;
    }

    public function register($obj,$code){
        $user=new Users;
        $user->name=$obj['name'];
        $user->password=Crypt::encrypt($obj['password']);
        $user->mark=$code['id'];
        $user->role_id=10;
        $bol=$user->save();
        return $bol;
    }

    public function getAll($obj){
        $role_id=$obj['role_id'];
        $name=$obj['id'];
        switch($role_id){
            case 0:
            $model=$this->getModel()::where('role_id','>',$role_id)->get(['id','name','points','role_id']);
            break;
            case 1:
            $model=$this->getModel()::where('role_id','>',$role_id)->get(['id','name','points','role_id']);
            break;
            case 2:
            $model=$this->getModel()::where('mark',$name)->get(['id','name','points','role_id']);
            break;
            default:
            $model=$this->getModel()::where('role_id',$role_id)->get(['id','name','points','role_id']);
            break;
        }
        if(!empty($model)){
         return $model;
        }else{
             return false;
        }
    }

    public function settingUser($obj){
        $_role_id=$obj['_roleid'];
        $model=$this->getModel()::find($obj['_id']);
        $model->role_id=$_role_id;
        $bol=$model->save();
        return $bol; 

    }

    public function onceData($id,$string){

          $model=$this->getModel()::where('id',$id)->get([$string]);
          return $model;
    }
   
}
