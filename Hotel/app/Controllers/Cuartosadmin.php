<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CuartosModel;
use App\Models\TipoCuartoModel;

class Cuartosadmin extends Controller
{
    public $modeloCuartos;
    public $modeloTipo;

    public function __construct()
    {
        $this->modeloCuartos = new CuartosModel();
        $this->modeloTipo = new TipoCuartoModel();
    }

    public function index()
    {
        $data = $this->modeloCuartos->recuperarCuarto();
        $data = array('room'=>$data); 
        return view('admin\cuartos\listarCuartos.php', $data);
       
    }

    public function nuevo()
    {
        //if(!isset($_POST['idTipoCuarto'])){
            $data = $this->modeloTipo->getTipoCuarto();
            $data = array('tipo' =>$data);
            return view('admin/cuartos/nuevo.php', $data); 
    }

    public function guardar(){
        
        $idTipoCuarto = $this->request->getPost('idTipoCuartoR');
        $identificador = $this->request->getPost('identificador');
        $estatus = 'DISPONIBLE'; 

        $data = [
            $idTipoCuarto,
            $identificador,
            $estatus
        ];
       
        //var_dump($data);
       $this->modeloCuartos->addCuartos($data);

        echo '<script type="text/javascript">
        alert("Cuarto añadido exitosamente.");
        window.location.href="../Cuartosadmin";
        </script>';
    }

    public function actualizarInfo()//Para obtener información don el id asignado.
    {
        $dataT = $this->modeloTipo->getTipoCuarto();
        $idCuarto = $this->request->getPost('idCuarto');
        $info = $this->modeloCuartos->getCuartosById($idCuarto);
        $data = array('room' =>$info,
                        'tipo' =>$dataT);
        //var_dump($info);
        return view('admin\cuartos\nuevo.php', $data); //$data,$dataT);  
    }

    public function actualizar()
    {
        $idCuarto = $this->request->getPost('idCuarto'); 
        $idTipoCuarto = $this->request->getPost('idTipoCuartoR');
        $identificador = $this->request->getPost('identificador');
        $estatus = 'DISPONIBLE';

        $data = [
            $idCuarto,
            $idTipoCuarto,
            $identificador,
            $estatus
        ];
        //var_dump($data);
        $this->modeloCuartos->editarCuartos($data);
        
        echo '<script type="text/javascript">
        alert("Cuartos actualizado exitosamente.");
        window.location.href="../Cuartosadmin";
        </script>';
    }

    public function eliminarCuarto()
    {
        $idCuarto = $this->request->getPost('idCuarto'); 
        //var_dump($idPersona);
        $this->modeloCuartos->borrar($idCuarto);

        echo '<script type="text/javascript">
        alert("Usuario eliminado exitosamente.");
        window.location.href="../Cuartosadmin";
        </script>';
    }

}