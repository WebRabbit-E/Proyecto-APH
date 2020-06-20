<?php namespace App\Models;

use CodeIgniter\Model;

class CuartosModel extends Model
{
    protected $table      = 'cuartos';
    protected $primaryKey = 'idCuarto';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['tipoCuarto_idTipoCuarto','numCuarto','estatus'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}