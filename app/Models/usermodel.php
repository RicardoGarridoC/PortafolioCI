<?php

namespace App\Models;

use CodeIgniter\Model;

class Usermodel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombres',
        'apellidos',
        'email',
        'run',
        'direccion',
        'telefono',
        'password_hash',
        'estado',
        'rol',
        'socio_id',
        'jugador_id',
        'equipo_tecnico_id'
    ];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function buscarUsuarioPorEmail($email)
    {

        $db = db_connect();
        $builder = $db->table($this->table)->where('email', $email)->where('estado', '1');
        $resultado = $builder->get();
        return $resultado->getResult() ? $resultado->getResult()[0] : false;
    }
}
