<?php

namespace App\Models;

use CodeIgniter\Model;

class DirigenteModel extends Model
{
    protected $table = 'dirigente';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['sueldo'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
?>
