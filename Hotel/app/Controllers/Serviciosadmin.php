<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ServicioModel;

class Serviciosadmin extends Controller
{
    public $modelo; 

    public function __construct()
    {
        $this->modelo = new ServicioModel(); 
    }

    public function index()
    {
        $data = $this->modelo->findAll();
        $data = array('ser' =>$data);
            //var_dump($data);
        return view('admin\servicios\listarServicios.php', $data);  
    }

    public function nuevo()
    {
        return view('admin/servicios/nuevo.php'); 
    }

    public function guardar()
    {   
            $rutaServidor = 'uploades'; 
            $nombre = $this->request->getPost('nombreServicio');//obtener nombre
            $desc = $this->request->getPost('descripcion');
            $precio = $this->request->getPost('precioServicio');//obtener descripción
            $file = $this->request->getFile('servicioIMG');//obtener el archvo
             
            //var_dump($nombre,$precio,$desc);
            if(! $file == false)
            {
                $file = $this->request->getFile('servicioIMG');
                $originalName = $file->getClientName();
                $rutaParaBD = $rutaServidor."/".$originalName;
                $path = $this->request->getFile('servicioIMG')->store('../../vendor\template\img\uploades', $originalName);
                $type = $file->getExtension();

                if($type == 'jpeg' || $type == 'jpg' || $type == 'png')
                {
                $idServicio = $this->modelo->insert([
                    "nombreServicio" => $nombre, 
                    "descripcion" => $desc,
                    "precioServicio" => $precio,
                    "servicioIMG" => $rutaParaBD
                   
                ]);

                echo '<script type="text/javascript">
                alert("Servicio añadido exitosamente.");
                window.location.href="../Serviciosadmin";
                </script>';
                }else
                {
                    echo '<script type="text/javascript">
                    alert("Error al subir servicio, intenta de nuevo");
                    window.location.href="../Serviciosadmin/nuevo";
                    </script>';
                    
                }
            
            }else
            {
                $file = $this->request->getFile('servicioIMG');
                $idServicio = $this->modelo->insert([
                    "nombreServicio" => $nombre, 
                    "descripcion" => $desc,
                    "precioServicio" => $precio,
                    "servicioIMG" => $file
                   
                ]);
                echo '<script type="text/javascript">
                alert("Evento añadido exitosamente.");
                window.location.href="../Serviciosadmin";
                </script>';
            }
    }

    function borrar(){
        $idServicio = $this->request->getPost('idServicio');
        $this->modelo->delete($idServicio); 

        echo '<script type="text/javascript">
        alert("Servicio eliminada exitosamente.");
        window.location.href="../Serviciosadmin";
        </script>';
    }
}