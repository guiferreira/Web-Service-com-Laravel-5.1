<?php



namespace App\Http\Controllers;

use App\User;
use Response;


class UserController extends Controller
{
    public function __construct(User $user){
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->user = $user;
    }

    public function allUsers()
    {
    	return Response::json($this->user->allUsers(),200);
    }
    public function getUser($id)
    {
    	$user = $this->user->getUser($id);
    	if(!$user){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($user,200);
    }
    public function saveUser()
    {
    	
        $user = $this->user->saveUser();
    	if(!$user){
    		return Response::json(['response'=>"Registro não adicionado!"], 400);
    	}
    	return Response::json(['response'=>"Registro adicionado!"],200);
    }
    public function updateUser($id)
    {
    	$user = $this->user->updateUser($id);
    	if(!$user){
    		return Response::json(['response'=>"Registro não encontrado!"], 400);
    	}
    	return Response::json($user,200);
    }
    public function deleteUser($id)
    {
    	if($this->user->deleteUser($id)){
    		return Response::json("Registro deletado com sucesso!",200);
    	}
    	return Response::json("Erro ao deletar registro!",400);
    	
    }
}
