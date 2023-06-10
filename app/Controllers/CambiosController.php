<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class CambiosController extends BaseController
{
    public function MostrarCambios()
    {
        $db = db_connect();

        $query = $db->query('SELECT
        CONCAT(j2.numero_camiseta ," ",u_sal.nombres," ", u_sal.apellidos) AS jugador_saliente,
        CONCAT(j.numero_camiseta , " ",u_ent.nombres, " ", u_ent.apellidos) AS jugador_entrante,
        c.minuto
    FROM
        partidos p
    INNER JOIN cambios c ON
        p.id = c.partido_fk
    LEFT JOIN usuarios u_sal ON
        c.jugador_saliente_fk = u_sal.jugador_id_fk
    LEFT JOIN usuarios u_ent ON
        c.jugador_entrante_fk = u_ent.jugador_id_fk
    left join jugadores j on
        c.jugador_entrante_fk = j.id 
    left join jugadores j2 on
        c.jugador_saliente_fk = j2.id 
    WHERE
        p.fecha = (
            SELECT
                MAX(fecha)
            FROM
                partidos
        )
    ORDER BY
        c.minuto ASC;');

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