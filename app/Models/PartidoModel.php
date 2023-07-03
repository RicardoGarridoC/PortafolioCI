<?php

namespace App\Models;

use CodeIgniter\Model;

class PartidoModel extends Model
{
    protected $table = 'partidos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['equipo_local_fk', 'equipo_visita_fk', 'ubicacion_fk', 'fecha', 'campeonato_id_fk'];

    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
?>
