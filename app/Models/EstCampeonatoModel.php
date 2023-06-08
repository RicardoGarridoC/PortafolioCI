<?php

namespace App\Models;

use CodeIgniter\Model;

class EstCampeonatoModel extends Model
{
    protected $table      = 'estadisticas_campeonato';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','nombre_campeonato','partidos_ganados','partidos_empatados','partidos_perdidos'
    ,'goles_favor','goles_contra','diferencia_goles','equipo_id_fk'];


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
}
?>