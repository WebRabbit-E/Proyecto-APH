<?php namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\CuartosModel;

class Cuartos extends Controller
{
    private $modeloCuartos;

    public function __construct()
    {
        $this->modeloCuartos = new CuartosModel();
    }
 
    public function index()
    {
        /*$data['cuartos'] = $this->modelo->recuperarCuarto();
        return view('cuartos', $data);*/  

        $data['cuartos'] = $this->modeloCuartos->findAll();
		return view('cuartos',$data);
    }
}