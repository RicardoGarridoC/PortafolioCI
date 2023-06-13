<?php

namespace App\Models;

use CodeIgniter\Model;

class IngresosModel extends Model
{
    protected $table = 'ingresos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['concepto', 'monto', 'fecha', 'id_usuario'];

    protected $validationRules = [
        'concepto' => 'required',
        'monto' => 'required',
        'fecha' => 'required',
        'id_usuario ' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
