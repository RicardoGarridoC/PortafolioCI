<?php

namespace App\Models;

use CodeIgniter\Model;

class CampeonatoModel extends Model
{
    protected $table = 'campeonatos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'division_id_fk', 'temporada'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
