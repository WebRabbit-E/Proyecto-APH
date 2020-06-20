<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\TipoCuartoModel;

class Home extends BaseController
{
	private $modelo;

	public function __construct()
	{
		$this->modelo = new TipoCuartoModel();
	}

	public function index()
	{
		$data['room'] = $this->modelo->findAll();
		return view('index',$data);
	}
	//--------------------------------------------------------------------

}
