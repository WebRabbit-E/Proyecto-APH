<?php namespace App\Models;

use CodeIgniter\Model;

class RecepcionistasModel extends Model
{
    protected $table      = 'recepcionistas';
    protected $primaryKey = 'idCliente';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['personas_idPersonaR'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}