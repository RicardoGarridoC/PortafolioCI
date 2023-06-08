<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UltimoPartidoController extends BaseController
{
    public function MostrarPartido()
    {
        $db = db_connect();

        $query = $db->query('select
        e1.nombre as equipo_local,
        SUM(case when g.jugador_id_fk is not null then 1 else 0 end) as goles_equipo_local,
        e2.nombre as equipo_visita,
        SUM(case when g.jugador_id_fk is null then 1 else 0 end) as goles_equipo_visita
    from
        partidos p
    inner join equipos e1 on
        p.equipo_local_fk = e1.id
    inner join equipos e2 on
        p.equipo_visita_fk = e2.id
    left join goles g on
        p.id = g.partido_id_fk
    where
        p.fecha = (
        select
            MAX(fecha)
        from
            partidos)
        and (e1.id = 10
            or e2.id = 10)
    group by
        e1.nombre,
        e2.nombre;');
        $results = $query->getResult();

        $data['results'] = $results;

        return view('ultimo_partido', $data);
    }
}
