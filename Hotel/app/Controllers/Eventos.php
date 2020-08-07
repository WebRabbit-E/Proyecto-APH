<?php namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\EventosModel;

class Eventos extends Controller
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new EventosModel();
    }

    public function index()
    {
        $data = $this->modelo->findAll();
        $data= array('eve' =>$data);
        return view('eventos',$data);
        //print_r($data); 
    }

}