<?php namespace App\Models;
use CodeIgniter\Model;

class TipoCuartoModel extends Model
{
    protected $table = 'tipocuarto';
    protected $primayKey = 'idTipoCuarto'; 

    protected $returnType = 'array';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['idTipoCuarto','tipoCuarto','precioCuarto'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    /*
    public function recuperarTipoCuarto(){
        $consulta = $this->db->query('call sp_recuperarTodosTipoCuarto()');
        $result=$consulta->getResultArray();
        return $result; 
    }*/
}