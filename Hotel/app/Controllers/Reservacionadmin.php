<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ReservacionModel;
use App\Models\ClientesModel; 

class Reservacionadmin extends Controller
{
    public $modelo; 
    public $modeloClientes;

    public function __construct()
    {
        $this->modeloClientes = new ClientesModel(); 
        $this->modelo = new ReservacionModel();
    }

    public function index()
    {
        $data = $this->modelo->getReservaciones();
        $data = array('res' =>$data);
        //var_dump($data);
        return view('admin\reservacion\listarReservacion.php', $data);
    }

    public function nuevo()
    {
        $data = $this->modeloClientes->getClientes();
        $data = array('client' =>$data); 
        //var_dump($data);
        return view('admin\reservacion\nuevo.php', $data); 
    }

    public function guardar(){
        
        $idCliente = $this->request->getPost('idClienteR');
        $fecha1 = $this->request->getPost('fechaEntrada');
        $fecha2 = $this->request->getPost('fechaSalida');
        $estancia = 0;
        $aprovado = 'No Aprovado';

        $data = [
            $idCliente,
            $fecha1,
            $fecha2,
            $estancia,
            $aprovado
        ];
       
        //var_dump($data);
       $this->modelo->addReservaciones($data);

        echo '<script type="text/javascript">
        alert("Reservación añadida exitosamente.");
        window.location.href="../Reservacionadmin";
        </script>';
    }

    public function actualizarInfo()//Para obtener información don el id asignado.
    {
        $dataCli = $this->modeloClientes->getClientes();
        $idReservacion = $this->request->getPost('idReservacion');
        $info = $this->modelo->getReservacionesById($idReservacion);
        $data = array('res' =>$info, 'client' =>$dataCli);
        //var_dump($data);
        return view('admin\reservacion\nuevo.php', $data);  
    }

    public function actualizar(){
        $idReservacion = $this->request->getPost('idReservacion');
        $idCliente = $this->request->getPost('idClienteR');
        $fecha1 = $this->request->getPost('fechaEntrada');
        $fecha2 = $this->request->getPost('fechaSalida');

        $data = [
            $idReservacion,
            $idCliente,
            $fecha1,
            $fecha2,
            
        ];
       
        //var_dump($data);
       $this->modelo->editarReservaciones($data);

        echo '<script type="text/javascript">
        alert("Reservación modificada exitosamente.");
        window.location.href="../Reservacionadmin";
        </script>';
    }

    public function eliminarReservacion()
    {
        $idReservacion = $this->request->getPost('idReservacion'); 
        //var_dump($idPersona);
        $this->modelo->borrar($idReservacion);

        echo '<script type="text/javascript">
        alert("Reservación eliminado exitosamente.");
        window.location.href="../Reservacionadmin";
        </script>';
    }

}