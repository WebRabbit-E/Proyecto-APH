<?php namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\MensajesModel;

class Contacto extends Controller
{
    private $modeloMjs; 
    private $direccion;

    public function __construct()
    {
        $this->modeloMjs = new MensajesModel(); 
    }

    public function index()
    {
        return view('contacto'); 
    }

    public function guardarMensaje()
    {
        $nombreMsj = $this->request->getPost('nombreMsj');
        $correoMsj = $this->request->getPost('correoMsj');
        $telefonoMsj = $this->request->getPost('telefonoMsj');

        if(! $telefonoMsj)
        {
            $telefonoMsj = null;
        }else{
            $telefonoMsj = $this->request->getPost('telefonoMsj');
        }
            
        $mensaje = $this->request->getPost('mensaje');
        $estatusMsj = $this->request->getPost('estatusMsj');
            
            $idMensaje = $this->modeloMjs->insert([
                "nombreMsj" => $nombreMsj,
                "correoMsj" => $correoMsj,
                "telefonoMsj" => $telefonoMsj,
                "mensaje" => $mensaje,
                "estatusMsj" => $estatusMsj
            ]);

            echo '<script type="text/javascript">
            alert("Mensaje eviado exitosamente");
            window.location.href="../Contacto";
            </script>';
        
    }

}