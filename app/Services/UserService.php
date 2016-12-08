<?php  
namespace App\Services;
use App\Interfaces\BaseUserInterface;
use App\Interfaces\BaseCodeInterface;
use App\Helps\Utils;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Crypt;
/**
 * 
* 
*/
class UserService
{
	private $user; 
	private $message;
	private $register;
	 function __construct(BaseUserInterface $user,
	 					  BaseCodeInterface $code,
	 						Utils $message)
	{
		
		$this->user=$user;
		$this->code=$code;
		$this->message=$message;
	}

	public  function getToken($obj){
	
		$name=$obj->get('name');
		$password=$obj->get('password');
		if(empty($name)){
			 return $this->message->errorMessage("账号不能为空");
		};
		if(empty($password)){
			return $this->message->errorMessage("密码不能为空");
		};
		$model=$this->user->find($obj);
		if(empty($model)){
			return $this->message->errorMessage("用户名不存在");
		};
		if($password==Crypt::decrypt($model->password)){
				$res['Token'] = JWTAuth::fromUser($model);
				$res['RoleId']=$model->role_id;
				$res['UserName']=$model->name;
				$res['Id']=$model->id;
				return $this->message->successMessage("登录成功",$res);
		}else{
				return $this->message->errorMessage("密码错误");
		};
	}	
	

	public  function addCode($obj){
		if($obj->get('roleId')!=1){
			return "你没有权限";
		};
		$model=$this->user->find($obj);	
		$code=$this->message->createCode(6,$obj['num']);	
		$bol=$this->code->create($code,$obj);
		if($bol){
			return $this->message->successMessage('创建成功',$code);
		};
	}	

	public function getUsers($obj){
		$model=$this->user->getUsers($obj);
		if(!empty($model)){
			return $this->message->successMessage('成功',$model);
		};
	}
	public function getCode($obj){
		$model=$this->code->getCode($obj);
		if(!empty($model)){
			return $this->message->successMessage('成功',$model);
		};
	}

	public function register($obj){
		$user=$this->user->find($obj);
		$code=$this->code->getOnceCode($obj);

		if(empty($code)){
			return $this->message->errorMessage('验证码无效'); 
		};
		if(!empty($user)){
			return $this->message->errorMessage('注册失败,该用户名已经存在'); 
		};
		$model=$this->user->register($obj,$code);
		if($model){
			 $this->code->setOnceCode($code);
			 return $this->message->successMessage('注册成功',$model);
		}else{
			return $this->message->errorMessage('注册失败');
		};
	}
	
	public function deductPoints($obj){
		if(!empty($obj)){
			$model=$this->user->deductPoints($obj);
		}
		if(!$model){
			return $this->message->errorMessage('下注失败');
		}else{
			return $model;
		}
	}
}