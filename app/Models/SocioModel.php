<?php namespace App\Models;
use CodeIgniter\Model;

class SocioModel extends Model{
    protected $table = 'socios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    //HACER JOINS
    protected $allowedFields = ['nombres', 'apellidos', 'run', 'direccion', 'telefono', 'email', 'fecha_nacimiento', 'fecha_pago', 'password'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    
    
}
?>