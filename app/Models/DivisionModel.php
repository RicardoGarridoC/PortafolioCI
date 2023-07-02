<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisionModel extends Model
{
    protected $table = 'division';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['categoria'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}