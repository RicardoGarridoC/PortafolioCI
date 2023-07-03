<?php

namespace App\Models;

use CodeIgniter\Model;

class SouvenirModel extends Model
{
    protected $table = 'souvenirs';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['producto', 'talla', 'precio', 'genero', 'detalle', 'foto', 'stock'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}