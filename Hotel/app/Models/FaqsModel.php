<?php namespace App\Models;
use CodeIgniter\Model;

class FaqsModel extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'idFaq';

    protected $returnType = 'array'; 

    protected $useSoftDeletes = false;

    protected $allowedFields = ['idFaq','pregunta','respuesta'];
    
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getFaqById($idFaq)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('faq');
        $builder->select('*');
        $builder->where('idFaq',$idFaq);
        $query = $builder->get();
        return $query->getResultArray();
    }
}