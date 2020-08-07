<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\FaqsModel; 

class Faqsadmin extends Controller
{
    public $modelo;

    public function __construct()
    {
        $this->modelo = new FaqsModel();  
    }

    public function index()
    {
        $data = $this->modelo->findAll();
        $data = array('faq' =>$data); 
        return view('admin/faq/listarFaq.php', $data); 
    }

    public function nuevo(){
        return view('admin/faq/nuevo.php'); 
    }

    public function guardar()
    {
        $pregunta = $this->request->getPost('pregunta');
        $respuesta = $this->request->getPost('respuesta'); 

        $idFaq = $this->modelo->insert([
            "pregunta" => $pregunta,
            "respuesta" => $respuesta
        ]);

        echo '<script type="text/javascript">
        alert("Pregunta añadida exitosamente.");
        window.location.href="../Faqsadmin";
        </script>';
    }

    public function actualizarInfo()
    {
        $idFaq = $this->request->getPost('idFaq');
        $info = $this->modelo->getFaqById($idFaq);
        $data = array('faq' =>$info);
        return view('admin/faq/nuevo.php',$data);
        //return view('nuevo.php'.$data); 
    }

    public function actualizar(){
        $idFaq = $this->request->getPost('idFaq');
        $pregunta = $this->request->getPost('pregunta');
        $respuesta = $this->request->getPost('respuesta');

        $data = [
            "pregunta" => $pregunta, 
            'respuesta' => $respuesta 
        ];

       // var_dump($idFaq,$data); 

        $this->modelo->update($idFaq, $data);
        
        echo '<script type="text/javascript">
        alert("Pregunta actualizada exitosamente.");
        window.location.href="../Faqsadmin";
        </script>';
    }

    public function borrar(){
        $idF = $this->request->getPost('idFaq');
        $this->modelo->delete($idF);
        //var_dump($idF);
        echo '<script type="text/javascript">
        alert("Pregunta eliminada exitosamente.");
        window.location.href="../Faqsadmin";
        </script>';
    }
}