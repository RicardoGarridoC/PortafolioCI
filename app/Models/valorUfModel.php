<?php

namespace App\Models;

use CodeIgniter\Model;

class ValorUtmModel extends Model
{
    protected $table = 'valor_utm';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['valor'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
?>