<?php namespace App\Models;
use CodeIgniter\Model;

class CuentaModel extends Model
{
    protected $table = 'cuenta';
    protected $primaryKey = 'idCuenta';

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

    public function getCuenta()
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL sp_recuperarTodasCuentas()');
        return $query->getResultArray();
    }

    public function getCuentasById($idCuenta)
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL sp_buscarPorIdCuenta(?)', $idCuenta);
        return $query->getResultArray();
    }

    public function addReservaciones($data)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_addReservaciones(?,?,?,?,?)', $data);
        echo 'ok';
    }

    public function addCuenta($data)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_addCuenta(?,?)', $data);
        echo 'ok';
    }

    public function editarCuenta($data){
        $db = \Config\Database::connect();
        $db->query('CALL sp_modificarCuenta(?,?,?,?)', $data);
    }

    public function borrar($idCuenta)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_eliminarCuenta(?)', $idCuenta); 
    }
}