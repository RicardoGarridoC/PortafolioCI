<?php

namespace App\Models;

use CodeIgniter\Model;

class CanchaModel extends Model
{
    protected $table = 'cancha';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'ubicacion'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
?>
