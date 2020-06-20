<?php namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\EventosModel;

class Eventos extends Controller
{
    public function index()
    {
        $modelo= new EventosModel();
        $data = $modelo->findAll();
        $data= array('eve' =>$data);
        return view('eventos',$data);
        //print_r($data); 
    }
}