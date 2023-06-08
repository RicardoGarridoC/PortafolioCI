<?php namespace App\Models;
use CodeIgniter\Model;

class SocioModel extends Model
{
    protected $table = 'socios';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'fecha_pago'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
?>