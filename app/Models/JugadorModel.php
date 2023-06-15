<?php

namespace App\Models;

use CodeIgniter\Model;

class JugadorModel extends Model
{
    protected $table      = 'jugadores';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','posicion','partidos_jugados','tipo','sueldo','ayuda_economica','numero_camiseta', 'genero',
    'equipo_proviene_id_fk','button_field'];
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

    public function obtenerJugadoresPorGenero($genero)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jugadores j');
        $builder->select("CONCAT(u.nombres, ' ', u.apellidos) as nombre_completo, j.sueldo");
        $builder->join('usuarios u', 'u.jugador_id_fk = j.id');
        $builder->where('j.genero', $genero);
        $builder->where('j.sueldo !=', null);
        return $builder->get()->getResultArray();
    }

    
}
