<?php 

namespace App\Services;
use Illuminate\Support\Facades\Event;
use App\Events\EventBoradcast;
use App\Events\EventRechange;
use App\Events\EventCash;
/**
* 
*/
class EventService 
{
	public $user;
	public $channel;


	public function broadcast($obj){
			$this->user = array('name'=>$obj['name'],
						  'action'=>$obj['action'],
						  'money'=>$obj['money'],
						  'created_at'=>date('Y-m-d H:i:s'));
		    $this->channel ='action-'.$obj['mark'];
    		Event::fire(new EventBoradcast($this->user,$this->channel));

	}

	public function rechange($user,$channel){
		$this->user=$user;
		$this->channel='recharge-'.$channel;
		Event::fire(new EventRechange($this->user,$this->channel));
	}
	public function cash($user,$channel){
		$this->user=$user;
		$this->channel='cash-'.$channel;
		Event::fire(new EventCash($this->user,$this->channel));
	}
}
