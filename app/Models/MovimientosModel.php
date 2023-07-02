<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimientosModel extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['motivo_fk', 'descripcion', 'fecha', 'usuario_fk'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}