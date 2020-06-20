<?php namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\CuartosModel;

class Cuartos extends Controller
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new CuartosModel();
    }
 
    public function index()
    {
        $data['cuartos'] = $this->modelo->recuperarCuarto();
        return view('cuartos', $data); 
    }
}