<?php namespace App\Models;
use CodeIgniter\Model;

class TipoCuartoModel extends Model
{
    protected $table = 'tipocuarto';
    protected $primaryKey = 'idTipoCuarto'; 

    protected $returnType = 'array';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['idTipoCuarto','tipoCuarto','precioCuarto','imgUrl','description'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getTipoCuarto()
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL sp_recuperarTodosTipoCuarto()');
        return $query->getResultArray();
    }

    public function getTipoCuartoById($idTipoCuarto)
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL sp_buscarPorIdTipoCuarto(?)', $idTipoCuarto);
        return $query->getResultArray();
    }

    public function addTipoCuarto($data)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_addTipoCuarto(?,?)', $data);
    }

    public function editarTipoCuarto($data){
        $db = \Config\Database::connect();
        $db->query('CALL sp_modificarTipoCuarto(?,?,?)', $data);
    }

    public function borrar($idTipoCuarto)
    {
        $db = \Config\Database::connect();
        $db->query('CALL sp_eliminarTipoCuarto(?)', $idTipoCuarto); 
    }
}