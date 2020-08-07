<?php namespace App\Models;
use CodeIgniter\Model; 

class ClientesModel extends Model
{
    protected $tables = 'recepcionistas,personas,telefonos';
    protected $primaryKeys = 'idRecepcionista,idPersona,telefonos';

    protected $returnType = 'array'; 

    protected $useSoftDeletes = false;

    protected $allowedFields = [''];
    
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getClientes()
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL sp_recuperarTodosClientes()');
        return $query->getResultArray();
    }

    public function getClientesById($idPersona)
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL sp_buscarPorIdPersona(?)', $idPersona);
        return $query->getResultArray();
    }

    public function addClientes($data)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_addPersona(?,?,?,?,?,?)', $data);
        echo 'ok';
    }

    public function editarClientes($data){
        $db = \Config\Database::connect();
        $db->query('CALL sp_modificarPersona(?,?,?,?,?,?,?,?)', $data);
    }

    public function borrar($idPersona)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_eliminarPersona(?)', $idPersona); 
    }
}