<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class CambiosController extends BaseController
{
    public function MostrarCambios()
    {
        $db = db_connect();

        $query = $db->query('select
        CONCAT(u_sal.nombres, " ", u_sal.apellidos) as jugador_saliente,
        CONCAT(u_ent.nombres, " ", u_ent.apellidos) as jugador_entrante,
        c.minuto
    from
        partidos p
    inner join cambios c on
        p.id = c.partido_fk
    left join usuarios u_sal on
        c.jugador_saliente_fk = u_sal.jugador_id_fk
    left join usuarios u_ent on
        c.jugador_entrante_fk = u_ent.jugador_id_fk
    where
        p.fecha = (
        select
            MAX(fecha)
        from
            partidos
        )
    order by
        c.minuto asc;');

        $results = $query->getResult();

        // Preparar los datos en un formato adecuado
        $data['results'] = array();

        foreach ($results as $row) {
            $data['results'][] = array(
                'jugador_saliente' => $row->jugador_saliente,
                'jugador_entrante' => $row->jugador_entrante,
                'minuto' => $row->minuto
            );
        }

        return view('cambios', $data);
    }
}