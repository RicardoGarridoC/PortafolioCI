<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class InfoGolesController extends BaseController
{
    public function MostrarInfoGoles()
    {
        $db = db_connect();

        $query = $db->query('select
        case
            when g.jugador_id_fk is not null then e1.nombre
            else e2.nombre
        end as nombre_equipo,
        case
            when g.jugador_id_fk is not null then CONCAT(j.numero_camiseta, " ",u.nombres, " ", u.apellidos)
            else g.jugador_visita
        end as nombre_jugador,
        g.minuto as minuto_gol
    from
        partidos p
    inner join equipos e1 on
        p.equipo_local_fk = e1.id
    inner join equipos e2 on
        p.equipo_visita_fk = e2.id
    left join goles g on
        p.id = g.partido_id_fk
    left join usuarios u on
        g.jugador_id_fk = u.jugador_id_fk
    left join jugadores j on
        j.id = g.jugador_id_fk 
    where
        p.fecha = (
        select
            MAX(fecha)
        from
            partidos
      )
        and (e1.id = 10
            or e2.id = 10);');

        $results = $query->getResult();

        // Preparar los datos en un formato adecuado
        $data['results'] = array();

        foreach ($results as $row) {
            $data['results'][] = array(
                'nombre_equipo' => $row->nombre_equipo,
                'minuto_gol' => $row->minuto_gol,
                'nombre_jugador' => $row->nombre_jugador
            );
        }

        return view('info_goles', $data);
    }
}
