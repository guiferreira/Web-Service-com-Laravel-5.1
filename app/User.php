<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Hash;

class User extends Model
{

	protected $hidden = ['senha'];

	protected $fillable = ['nome','sobrenome','email','senha'];

    public function allUsers(){
    	return self::all();
    }

    public function getUser($id){
    	$user = self::find($id);
    	if(is_null($user)){
    		return false;
    	}
    	return $user;
    }

    public function saveUser(){
    	$input = Input::all();
            	 	
		$input['senha'] = Hash::make($input['senha']);
    	$user = new User();
    	$user->fill($input); // associação em massa
    	
    	$email = self::lists('email')->all();
    	foreach ($email as $key => $value) {
    		if($value == $input['email']){
    			return false;
    		}
    	} 	

    	return $user->save();
    	
    }

    public function updateUser($id)
    {
    	$user = self::find($id);
    	if(is_null($user)){
    		return false;
    	}
    	$input = Input::all();
    	if(isset($input['senha'])){
    		$input['senha'] = Hash::make($input['senha']);
    	}
    	$user->fill($input); // associação em massa
    	$user->save();
    	return $user;
    }

    public function deleteUser($id)
    {
    	$user = self::find($id);
    	if(is_null($user)){
    		return false;
    	}
    	return $user->delete();
    }
    
}
