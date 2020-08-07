<?php namespace App\Controllers;
use CodeIgniter\Controller;

class CpanelIndex extends Controller
{
    public function index()
    {
        return view('admin/index'); 
    }
}