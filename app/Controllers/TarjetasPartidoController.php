<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class TarjetasPartidoController extends BaseController
{
    public function MostrarTarjetas()
    {
        $db = db_connect();

        $query = $db->query('SELECT
        CASE
          WHEN tp.jugador_fk IS NOT NULL THEN CONCAT(u.nombres, " ", u.apellidos)
          ELSE tp.jugador_externo
        END AS jugador,
        tp.tarjeta,
        tp.minuto,
        CASE
          WHEN tp.jugador_fk IS NULL THEN ev.nombre
          ELSE el.nombre
        END AS equipo
      FROM tarjetas_partido tp
      LEFT JOIN jugadores j ON j.id = tp.jugador_fk
      LEFT JOIN usuarios u ON u.jugador_id_fk = j.id
      LEFT JOIN partidos p ON p.id = tp.partido_fk
      LEFT JOIN equipos el ON el.id = p.equipo_local_fk
      LEFT JOIN equipos ev ON ev.id = p.equipo_visita_fk
      where
              p.fecha = (
              select
                  MAX(fecha)
              from
                  partidos
            );');

        $results = $query->getResult();

        // Preparar los datos en un formato adecuado
        $data['results'] = array();

        foreach ($results as $row) {
            $data['results'][] = array(
                'jugador' => $row->jugador,
                'tarjeta' => $row->tarjeta,
                'minuto' => $row->minuto,
                'equipo' => $row->equipo
            );
        }

        return view('tarjetas_partido', $data);
    }
}
