<?php namespace App\Models;
use CodeIgniter\Model;

class ServicioModel extends Model
{
    protected $table = 'servicios';
    protected $primayKey = 'idServicio'; 

    protected $returnType = 'array';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['idServicio','nombreServicio','descripcion','precioServicio'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}