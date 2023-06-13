<?php

namespace App\Models;

use CodeIgniter\Model;

class IngresoModel extends Model
{
    protected $table = 'ingresos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['concepto', 'monto', 'fecha', 'detalle'];

    protected $validationRules = [
        'concepto' => 'required|in_list[mensualidad,sponsor,actividades_extra]',
        'fecha' => 'required|valid_date',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
