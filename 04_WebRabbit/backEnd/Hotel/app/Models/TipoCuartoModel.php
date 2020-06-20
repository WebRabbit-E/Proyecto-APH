<?php namespace App\Models;

use CodeIgniter\Model;

class TipoCuartoModel extends Model
{
    protected $table      = 'tipocuarto';
    protected $primaryKey = 'idTipoCuarto';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['tipoCuarto','precioCuarto'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}