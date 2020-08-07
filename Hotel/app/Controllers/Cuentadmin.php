<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CuentaModel;
use App\Models\ReservacionModel;
use App\Models\CuartosModel; 

class Cuentadmin extends Controller
{
    public $modelo; 
    public $reservacionModel;
    public $cuartosModel;

    public function __construct()
    {
        $this->cuartosModel = new CuartosModel(); 
        $this->reservacionModel = new ReservacionModel();
        $this->modelo = new CuentaModel();
    }

    public function index()
    {
        $data = $this->modelo->getCuenta();
        $data = array('cu' =>$data);
        //var_dump($data);
        return view('admin\cuenta\listarCuenta.php', $data);
    }

    public function nuevo()
    {
        $dataC = $this->cuartosModel->recuperarCuarto();
        $info = $this->reservacionModel->getReservaciones();
        $data = array('res' =>$info, 'room' =>$dataC); 
        //var_dump($data);
        return view('admin\cuenta\nuevo.php', $data); 
    }

    public function guardar(){
        
        $idRes = $this->request->getPost('idReservacionR');
        $idCuarto = $this->request->getPost('idCuartoR');
        

        $data = [
            $idRes,
            $idCuarto,
            
        ];
       
        //var_dump($data);
       $this->modelo->addCuenta($data);

        echo '<script type="text/javascript">
        alert("Cuenta añadida exitosamente.");
        window.location.href="../Cuentadmin";
        </script>';
    }

    public function actualizarInfo()//Para obtener información don el id asignado.
    {
        $idCuenta = $this->request->getPost('idCuenta');
        $infoCu = $this->modelo->getCuentasById($idCuenta);
        $dataC = $this->cuartosModel->recuperarCuarto();
        $info = $this->reservacionModel->getReservaciones();
        $data = array('res' =>$info, 'room' =>$dataC, 'cu' =>$infoCu); 
        //var_dump($data);
        return view('admin\cuenta\nuevo.php', $data);  
    }

    public function actualizar(){
        $idCuenta = $this->request->getPost('idCuenta');  
        $idRes = $this->request->getPost('idReservacionR');
        $idCuarto = $this->request->getPost('idCuartoR');
        $serv = 0;
        $data = [
            $idCuenta,
            $idRes,
            $idCuarto,
            $serv            
        ];
       
        //var_dump($data);
       $this->modelo->editarCuenta($data);

        echo '<script type="text/javascript">
        alert("Reservación modificada exitosamente.");
        window.location.href="../Cuentadmin";
        </script>';
    }

    
}