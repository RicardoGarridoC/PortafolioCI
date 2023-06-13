<?php

namespace App\Models;

use CodeIgniter\Model;

class EgresoModel extends Model
{
    protected $table = 'egresos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['concepto', 'monto', 'fecha', 'detalle'];

    protected $validationRules = [
        'monto' => 'required|decimal',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
?>
