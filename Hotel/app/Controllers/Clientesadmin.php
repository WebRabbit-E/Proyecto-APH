<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ClientesModel; 

class Clientesadmin extends Controller
{
    public $modelo; 

    public function __construct()
    {
        $this->modelo = new ClientesModel(); 
    }

    public function index()
    {
        $data = $this->modelo->getClientes();
        $data = array('client' =>$data);
        //var_dump($data);
        return view('admin/clientes/listarClientes.php', $data);
    }

    public function nuevo()
    {
        return view('admin/clientes/nevo.php'); 
    }

    public function guardar(){
        
        $nombre = $this->request->getPost('nombre');
        $apellido1 = $this->request->getPost('apellido1');
        $apellido2 = $this->request->getPost('apellido2');
        $numTelefono = $this->request->getPost('numTelefono');
        $privilegios = 1;
        $pass = $this->request->getPost('pass');

        $data = [
            $nombre,
            $apellido1,
            $apellido2,
            $pass,
            $privilegios,
            $numTelefono
        ];
       
        //var_dump($data);
       $this->modelo->addClientes($data);

        echo '<script type="text/javascript">
        alert("Cliente añadido exitosamente.");
        window.location.href="../Clientesadmin";
        </script>';
    }

    public function actualizarInfo()//Para obtener información don el id asignado.
    {
        $idPersona = $this->request->getPost('idPersona');
        $info = $this->modelo->getClientesById($idPersona);
        $data = array('client' =>$info);
        //var_dump($info);
        return view('admin\clientes\nevo.php', $data);  
    }

    public function actualizar()
    {
        $idPersona = $this->request->getPost('idPersona');
        $idTelefono = $this->request->getPost('telefonos_idTelefono');
        $nombre = $this->request->getPost('nombre');
        $apellido1 = $this->request->getPost('apellido1');
        $apellido2 = $this->request->getPost('apellido2');
        $numTelefono = $this->request->getPost('numTelefono');
        $privilegios = 1;
        $pass = $this->request->getPost('pass');

        $data = [
            $idPersona,
            $idTelefono,
            $nombre,
            $apellido1,
            $apellido2,
            $pass,
            $privilegios,
            $numTelefono
        ];
        //var_dump($data);
        $this->modelo->editarClientes($data);
        
        echo '<script type="text/javascript">
        alert("Cliente actualizado exitosamente.");
        window.location.href="../Clientesadmin"; 
        </script>';
    }

    public function eliminarCliente()
    {
        $idPersona = $this->request->getPost('idPersona'); 
        //var_dump($idPersona);
        $this->modelo->borrar($idPersona);

        echo '<script type="text/javascript">
        alert("Cliente eliminado exitosamente.");
        window.location.href="../Clientesadmin";
        </script>';
    }
}