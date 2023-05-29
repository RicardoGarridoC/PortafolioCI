<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioRegisterModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombres', 'apellidos', 'email', 'run', 'direccion', 'telefono', 'password_hash', 'rol'];
    
    protected $validationRules = [
        'nombres' => 'required',
        'apellidos' => 'required',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'run' => 'required',
        'direccion' => 'required',
        'telefono' => 'required|numeric|min_length[8]',
        'password_hash' => 'required|min_length[6]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
