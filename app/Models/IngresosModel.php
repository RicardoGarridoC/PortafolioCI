<?php

namespace App\Models;

use CodeIgniter\Model;

class IngresosModel extends Model
{
    protected $table = 'ingresos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['concepto', 'monto', 'fecha', 'detalle', 'id_usuario_fk'];

    protected $validationRules = [
        'concepto' => 'required',
        'monto' => 'required',
        'fecha' => 'required',
        'id_usuario_fk ' => 'required',
        'detalle' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
