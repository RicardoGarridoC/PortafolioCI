<?php namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;


    protected $allowedFields = ['nombres', 'apellidos', 'email', 'run', 'direccion', 'telefono', 'password_hash', 'rol'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false; 
}
?>