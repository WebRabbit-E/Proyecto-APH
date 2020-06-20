<?php namespace App\Models;

use CodeIgniter\Model;

class TelefonosModel extends Model
{
    protected $table      = 'telefonos';
    protected $primaryKey = 'idTelefono';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['numTelefono'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}