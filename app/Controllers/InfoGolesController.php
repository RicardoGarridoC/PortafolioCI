<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class InfoGolesController extends BaseController
{
    public function MostrarInfoGoles()
    {
        $db = db_connect();

        $query = $db->query('SELECT
            CASE
                WHEN g.jugador_id_fk IS NOT NULL THEN e1.nombre
                ELSE e2.nombre
            END AS nombre_equipo,
            CASE
                WHEN g.jugador_id_fk IS NOT NULL THEN CONCAT(u.nombres, " ", u.apellidos)
                ELSE g.nombre_jugador_visita
            END AS nombre_jugador,
            g.minuto AS minuto_gol
        FROM
            partidos p
            INNER JOIN equipos e1 ON p.equipo_local_fk = e1.id
            INNER JOIN equipos e2 ON p.equipo_visita_fk = e2.id
            LEFT JOIN goles g ON p.id = g.partido_id_fk
            LEFT JOIN usuarios u ON g.jugador_id_fk = u.jugador_id_fk
        WHERE
            p.fecha = (SELECT MAX(fecha) FROM partidos)
            AND (e1.id = 10 OR e2.id = 10);');

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
