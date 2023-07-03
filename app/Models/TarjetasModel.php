<?php

namespace App\Models;

use CodeIgniter\Model;

class TarjetasModel extends Model
{
    protected $table = 'tarjetas_partido';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['jugador_fk', 'minuto', 'partido_fk', 'jugador_externo', 'tarjeta'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}