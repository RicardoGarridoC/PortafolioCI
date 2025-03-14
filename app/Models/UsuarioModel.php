<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'nombres', 'apellidos', 'email', 'run', 'direccion', 'telefono', 'password_hash', 'rol', 'socio_id_fk', 'jugador_id_fk', 'equipo_tecnico_id_fk', 'direccion_id_dk', 'button_field'
    ];

    // Dates
    /*protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    */

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function buscarUsuarioPorEmail($email)
    {
        $db = db_connect();
        //Saque estado, si quiere colocarlo faltara agregar en el modelo estado (y bdd)
        $builder = $db->table($this->table)->where('email', $email);
        $resultado = $builder->get();
        return $resultado->getResult() ? $resultado->getResult()[0] : false;
    }
    //retornar usuario
    public function getUserBy(string $column, string $value)
    {

        return $this->where($column, $value)->first();
    }
    public function getRole()
    {
        $model =  model('UsuarioModel');
        return  $model->where('rol', $this->rol)->get();
    }

    public function buscarUsuarioPorIdJugador($jugadorId)
    {
        return $this->where('jugador_id_fk', $jugadorId)->first();
    }
}
