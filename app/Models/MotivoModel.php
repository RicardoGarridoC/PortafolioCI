<?php

namespace App\Models;

use CodeIgniter\Model;

class MotivoModel extends Model
{
    protected $table = 'motivo';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_motivo', 'tipo'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}