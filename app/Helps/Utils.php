<?php  

namespace App\Helps;

/**
* return JOSN 
*/
class Utils 
{


	protected $str='QWERTYUIOPASDFGHJKLZXCVBNM123456789qwertyuiopasdfghjklzxcvbnm';
	function __construct()
	{
		# code...
	}
	protected function decode($_str){

		return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
        create_function(
            '$matches',
            'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
        ),
        $_str);
	}
	public function successMessage($_str,$obj=""){
		$str=$this->decode(json_encode($_str));
		return response()->json(["code"=>"I00000","message"=>$str,"data"=>$obj]);
	}
	public function errorMessage($_str,$obj=""){
		$str=$this->decode(json_encode($_str));
		return response()->json(["code"=>"E00000","message"=>$str,"data"=>$obj]);
	}
	public function createCode($len=6,$num=1){
		 $i=1;
		 $arr=[];
		 for($x=1;$x<=$num;$x++){
		  $str="";
		 	while ($i<=$len) {
			$str.=$this->str[rand(0,60)];
			$i++;
			}
			$i=1;
			array_push($arr,$str);
		 }
		 return $arr;
		
	}
	
}