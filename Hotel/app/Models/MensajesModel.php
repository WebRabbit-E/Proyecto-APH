<?php namespace App\Models;
use CodeIgniter\Model;

class MensajesModel extends model
{
    protected $table = 'mensajes'; 
    protected $primaryKey = 'idMensaje'; 

    protected $returnType = 'array';
    protected $useSoftDeletes = false; 
    
    protected $ceratedField = 'created_at'; 
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at'; 

    protected $allowedFields = ['nombreMsj','correoMsj','telefonoMsj','mensaje','estatusMsj'];

}