<?php

namespace App\Models;

use CodeIgniter\Model;

class CambiosExternoModel extends Model
{
    protected $table = 'cambios_externo';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['minuto', 'partido_id_fk', 'nombre_jugador_saliente', 'nombre_jugador_entrante'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
?>