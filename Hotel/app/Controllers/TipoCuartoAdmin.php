<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\TipoCuartoModel;


class TipoCuartoAdmin extends Controller
{
    public $modelo;

    public function __construct()
    {
        $this->modelo = new TipoCuartoModel(); 
    }

    public function index()
    {
        $data = $this->modelo->getTipoCuarto();
        $data = array('tipo' =>$data);
        //var_dump($data);
        return view('admin/tipoCuarto/listarTipoCuarto.php', $data); 
    }

    public function nuevo()
    {
        return view('admin/tipoCuarto/nuevo.php'); 
    }

    public function guardar()
    {   
            $rutaServidor = 'uploades'; 
            $nombre = $this->request->getPost('tipoCuarto');//obtener nombre
            $precio = $this->request->getPost('precioCuarto');//obtener descripción
            $file = $this->request->getFile('imgUrl');//obtener el archvo
            $desc = $this->request->getPost('descripcion'); 

            if(! $file == false)
            {
                $file = $this->request->getFile('imgUrl');
                $originalName = $file->getClientName();
                $rutaParaBD = $rutaServidor."/".$originalName;
                $path = $this->request->getFile('imgUrl')->store('../../vendor\template\img\uploades', $originalName);
                $type = $file->getExtension();

                if($type == 'jpeg' || $type == 'jpg' || $type == 'png')
                {
                $idTipoCuarto = $this->modelo->insert([
                    "tipoCuarto" => $nombre, 
                    "precioCuarto" => $precio,
                    "imgUrl" => $rutaParaBD,
                    "description" => $desc
                ]);

                echo '<script type="text/javascript">
                alert("Evento añadido exitosamente.");
                window.location.href="../TipoCuartoAdmin";
                </script>';
                }else
                {
                    echo '<script type="text/javascript">
                    alert("Error al subir evento, intenta de nuevo");
                    window.location.href="../TipoCuartoAdmin/nuevo";
                    </script>';
                    
                }
            
            }elseif(! $file == true)
            {
                $rutaParaBD = 'null';
                $idTipoCuarto = $this->modelo->insert([
                    "tipoCuarto" => $nombre, 
                    "precioCuarto" => $precio,
                    "imgUrl" => $rutaParaBD,
                    "description" => $desc
                ]); 
                echo '<script type="text/javascript">
                alert("Evento añadido exitosamente.");
                window.location.href="../TipoCuartoAdmin";
                </script>';
            }
    }

    public function borrar(){
        $idTipoCuarto = $this->request->getPost('idTipoCuarto');
        //var_dump($idTipoCuarto);
        $this->modelo->delete($idTipoCuarto);
        echo '<script type="text/javascript">
        alert("Tipo de cuarto eliminado exitosamente.");
        window.location.href="../TipoCuartoAdmin";
        </script>';
    }

}