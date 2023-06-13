<?php

namespace App\Models;

use CodeIgniter\Model;

class SponsorModel extends Model
{
    protected $table = 'sponsors';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'monto_por_partido', 'condiciones'];

    protected $validationRules = [
        'nombre' => 'required|is_unique[sponsors.nombre]',
        'monto_por_partido' => 'required',
        'condiciones' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
