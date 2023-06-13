<?php

namespace App\Models;

use CodeIgniter\Model;

class IngresosModel extends Model
{
    protected $table = 'ingresos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['concepto', 'monto', 'fecha', 'id_usuario','id_usuario_fk'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
