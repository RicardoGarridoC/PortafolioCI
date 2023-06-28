<?php namespace App\Models;
use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel
{

    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }

    function getSocios()
    {
        $builder = $this->db->table('socios');
        $builder->join('usuarios', 'socios.id = usuarios.socio_id_fk');
        $result = $builder->get()->getResultArray();
        return $result;
    }

    function getJugadores(){
        $builder = $this->db->table('jugadores');
        $builder->join('usuarios', 'jugadores.id = usuarios.jugador_id_fk');
        $result = $builder->get()->getResultArray();
        return $result;
    }

    function getEquipoTecnico(){
        $builder = $this->db->table('equipo_tecnico');
        $builder->join('usuarios', 'equipo_tecnico.id = usuarios.equipo_tecnico_id_fk');
        $result = $builder->get()->getResultArray();
        return $result;
    }
}
?>