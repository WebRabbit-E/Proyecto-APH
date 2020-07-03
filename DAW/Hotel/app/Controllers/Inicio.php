<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\TipoCuartoModel;

class Inicio extends Controller
{
	private $modelo;
    
	public function __construct()
	{
		$this->modelo = new TipoCuartoModel();
	}

/*	public function index()
	{
        $modelo= new TipoCuartoModel($db);
        $data = $modelo->getArray();
        $data= array('room' =>$data);
		return view('index',$data);
	}*/
	//--------------------------------------------------------------------

}