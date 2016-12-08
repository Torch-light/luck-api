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
    public function updatePoints($obj){
       
            $model=$this->getModel()::find($obj['uid']);
            $model->points=$model->points+$obj['money'];
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
        $user->mark=$code['name'];
        $user->role_id=10;
        $bol=$user->save();
        return $bol;
    }
   
}
