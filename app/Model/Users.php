<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;  
use Illuminate\Database\Eloquent\Model;
use App\Model\Register;	

class Users extends Authenticatable  
{
    //
   	protected $table='users';
   	
   	public function Register(){
   		return $this->hasOne(Register);
   	}
}
