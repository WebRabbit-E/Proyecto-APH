<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\FaqsModel;

class Faqs extends Controller
{
    public function index()
    {   
        return view('faqs', ['f'=>(new FaqsModel())->findAll()]);  
    }
}