<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class CambiosExternoController extends BaseController
{
    public function MostrarCambiosExterno()
    {
        $db = db_connect();

        $query = $db->query('select e.nombre as nombre_equipo,
        ce.nombre_jugador_saliente,
        ce.nombre_jugador_entrante ,
        ce.minuto 
        from cambios_externo ce
        inner join partidos p on
        ce.partido_id_fk = p.id 
        left join equipos e on
        e.id = p.equipo_visita_fk 
        where p.fecha = (
        select max(p2.fecha)
        from partidos p2)
        order by ce.minuto;');

        $results = $query->getResult();

        // Preparar los datos en un formato adecuado
        $data['results'] = array();

        foreach ($results as $row) {
            $data['results'][] = array(
                'nombre_equipo' => $row->nombre_equipo,
                'jugador_saliente' => $row->nombre_jugador_saliente,
                'jugador_entrante' => $row->nombre_jugador_entrante,
                'minuto' => $row->minuto
            );
        }

        return view('cambios_externo', $data);
    }
}