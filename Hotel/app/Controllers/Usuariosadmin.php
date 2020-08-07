<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;
use CodeIgniter\HTTP\Request;

class Usuariosadmin extends Controller
{
    public $modelo; 

    public function __construct()
    {
        $this->modelo = new UsuariosModel();
    }

    public function index()
    {
        $data = $this->modelo->getUsuarios();
        $data = array('user' =>$data);
        //var_dump($data);
        return view('admin/usuarios/listarUsuarios.php', $data);
    }

    public function nuevo()
    {
        return view('admin/usuarios/nuevo.php'); 
    }

    public function guardar(){
        
        $nombre = $this->request->getPost('nombre');
        $apellido1 = $this->request->getPost('apellido1');
        $apellido2 = $this->request->getPost('apellido2');
        $numTelefono = $this->request->getPost('numTelefono');
        $privilegios = 2;
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
       $this->modelo->addUsuarios($data);

        echo '<script type="text/javascript">
        alert("Usuario añadido exitosamente.");
        window.location.href="../Usuariosadmin";
        </script>';
    }

    public function actualizarInfo()//Para obtener información don el id asignado.
    {
        $idPersona = $this->request->getPost('idPersona');
        $info = $this->modelo->getUsuariosById($idPersona);
        $data = array('user' =>$info);
        //var_dump($info);
        return view('admin/usuarios/nuevo', $data);  
    }

    public function actualizar()
    {
        $idPersona = $this->request->getPost('idPersona');
        $idTelefono = $this->request->getPost('telefonos_idTelefono');
        $nombre = $this->request->getPost('nombre');
        $apellido1 = $this->request->getPost('apellido1');
        $apellido2 = $this->request->getPost('apellido2');
        $numTelefono = $this->request->getPost('numTelefono');
        $privilegios = 2;
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
        $this->modelo->editarUsuarios($data);
        
        echo '<script type="text/javascript">
        alert("Usuario actualizado exitosamente.");
        window.location.href="../Usuariosadmin";
        </script>';
    }

    public function eliminarUsuarios()
    {
        $idPersona = $this->request->getPost('idPersona'); 
        //var_dump($idPersona);
        $this->modelo->borrar($idPersona);

        echo '<script type="text/javascript">
        alert("Usuario eliminado exitosamente.");
        window.location.href="../Usuariosadmin";
        </script>';
    }
}