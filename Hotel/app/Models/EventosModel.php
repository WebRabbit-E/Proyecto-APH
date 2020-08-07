<?php namespace App\Models;
use CodeIgniter\Model;

class EventosModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'idEvento'; 

    protected $returnType = 'array';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['idEvento','nombreEvento','descEvento','imgEve'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getEventosById($idEvento)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('eventos');
        $builder->select('*');
        $builder->where('idEvento',$idEvento);
        $query = $builder->get();
        return $query->getResultArray();
    }

}