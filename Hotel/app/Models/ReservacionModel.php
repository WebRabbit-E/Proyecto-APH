<?php namespace App\Models;
use CodeIgniter\Model;

class ReservacionModel extends Model
{
    protected $table = 'reservaciones';
    protected $primaryKey = 'idReservacion';

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

    public function getReservaciones()
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL sp_recuperarTodosReservaciones()');
        return $query->getResultArray();
    }

    public function getReservacionesById($idReservacion)
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL sp_buscarPorIdReservacion(?)', $idReservacion);
        return $query->getResultArray();
    }

    public function addReservaciones($data)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_addReservaciones(?,?,?,?,?)', $data);
        echo 'ok';
    }

    public function editarReservaciones($data){
        $db = \Config\Database::connect();
        $db->query('CALL sp_modificarReservaciones(?,?,?,?)', $data);
    }

    public function borrar($idReservacion)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_eliminarReservasion(?)', $idReservacion); 
    }
}