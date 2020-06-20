<?php namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\ServicioModel;

class Servicios extends Controller
{
    public function index()
    {
        $modelo= new ServicioModel($db);
        $data = $modelo->findAll();
        $data= array('serv' =>$data);
        return view('servicios',$data); 
    }

    
}