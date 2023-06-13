<?php

namespace App\Models;

use CodeIgniter\Model;

class TraspasoModel extends Model
{
    protected $table = 'traspaso';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_jugador', 'equipo_origen', 'equipo_destino', 'fecha_traspaso', 'monto'];

    protected $validationRules = [

    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}