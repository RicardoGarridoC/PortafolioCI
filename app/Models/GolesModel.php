<?php

namespace App\Models;

use CodeIgniter\Model;

class GolesModel extends Model
{
    protected $table = 'goles';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['partido_id_fk', 'jugador_id_fk', 'minuto', 'jugador_visita'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}