<?php

namespace App\Models;

use CodeIgniter\Model;

class CambiosModel extends Model
{
    protected $table = 'cambios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['minuto' , 'jugador_entrante_fk', 'jugador_saliente_fk' , 'partido_fk'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}