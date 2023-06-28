<?php

namespace App\Models;

use CodeIgniter\Model;

class PagoSocioModel extends Model
{
    protected $table = 'pago_socio';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'monto'];

    protected $validationRules = [
        'id' => 'required',
        'monto' => 'required',

    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
