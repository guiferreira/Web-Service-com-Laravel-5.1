<?php

namespace App\Http\Controllers;


class PrincipalController extends Controller
{
    public function __construct(){
    	$this->middleware('guest');

    }
    
    public function index(){
    	$dados = "Dados de um Array";
    	return view('welcome')->with('dados',$dados);
    }
}
