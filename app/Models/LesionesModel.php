<?php

namespace App\Models;

use CodeIgniter\Model;

class LesionesModel extends Model
{
    protected $table = 'lesiones';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['fecha_inicio_lesion', 'fecha_fin_lesion', 'jugador_id_fk'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}