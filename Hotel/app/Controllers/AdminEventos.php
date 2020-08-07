<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\EventosModel; 

class AdminEventos extends Controller
{
    public $modelo;
    public function __construct()
    {
        $this->modelo = new EventosModel();
    
    }

    public function index()
    {
       $data = $this->modelo->findAll();
       $data= array('eve' =>$data);
    return view('admin/eventos/listarEventos.php',$data); 
    }
  
    public function nuevo()
    {
        return view('admin/eventos/nuevo.php'); 
    }

    public function actualizarInfo(){ 
        $evnetoId = $this->request->getPost('idEvento');
        $prueba = $this->modelo->getEventosById($evnetoId);

        $imagenVieja = base_url("vendor/template/img/".$prueba[0]['imgEve']);

        $ruta = '../../vendor\template\img\uploades';
        
        $data = array('eve' =>$prueba);
        return view('admin/eventos/nuevo.php',$data); 
        //print_r($prueba[0]['nombreEvento']);
    }

    public function guardar()
    {   
            $rutaServidor = 'uploades'; 
            $evento = $this->request->getPost('nombreEvento');//obtener nombre
            $desc = $this->request->getPost('descripcion');//obtener descripción
            $file = $this->request->getFile('imagenEvento');//obtener el archvo

            if(! $file == false)
            {
                $file = $this->request->getFile('imagenEvento');
                $originalName = $file->getClientName();
                $rutaParaBD = $rutaServidor."/".$originalName;
                $path = $this->request->getFile('imagenEvento')->store('../../vendor\template\img\uploades', $originalName);
                $type = $file->getExtension();

                if($type == 'jpeg' || $type == 'jpg' || $type == 'png')
                {
                $idEvento = $this->modelo->insert([
                    "nombreEvento" => $evento,
                    "descEvento" => $desc,
                    "imgEve" => $rutaParaBD
                ]);

                echo '<script type="text/javascript">
                alert("Evento añadido exitosamente.");
                window.location.href="../Admineventos";
                </script>';
                }else
                {
                    echo '<script type="text/javascript">
                    alert("Error al subir evento, intenta de nuevo");
                    window.location.href="../Admineventos/nuevo";
                    </script>';
                    
                }
            
            }elseif(! $file == true)
            {
                $rutaParaBD = 'null';
                $idEvento = $this->modelo->insert([
                    "nombreEvento" => $evento,
                    "descEvento" => $desc,
                    "imgEve" => $rutaParaBD
                ]);   
                echo '<script type="text/javascript">
                alert("Evento añadido exitosamente.");
                window.location.href="../Admineventos";
                </script>';
            }
    }

    public function borrar(){
        $idEvento = $this->request->getPost('idEvento');
        //var_dump($id);
        $this->modelo->delete($idEvento);
        echo '<script type="text/javascript">
        alert("Evento eliminado exitosamente.");
        window.location.href="../AdminEventos";
        </script>';
    }
}