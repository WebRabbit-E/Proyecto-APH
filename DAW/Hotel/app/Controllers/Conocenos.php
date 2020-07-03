<?php namespace App\Controllers; 
use CodeIgniter\Controller;

class Conocenos extends Controller
{
    public function index()
    {
        return view('sobreNosotros'); 
    }
}