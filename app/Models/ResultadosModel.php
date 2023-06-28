<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultadosModel extends Model
{
    protected $table = 'resultados';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'equipo_local_fk' , 'equipo_visita_fk' , 'goles_local', 'goles_visita', 'id_partido_fk', 'campeonato_id_fk'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}