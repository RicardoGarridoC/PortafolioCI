<?php namespace App\Controllers;

use App\Models\JugadorModel;
use CodeIgniter\Controller;

class SocioController extends BaseController
{
    public function inicioSocios()
    {
        //Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Inicio Socios',
        ];

        return view('socio/inicio_socios', $titulo);
    }
    
    public function mostrarJugador()
    {
        /*String p = "";
        foreach($p in $jugadores){
            var_dump($p);
        }*/
        $jugadorModel = new JugadorModel();
        $jugadores=$jugadorModel->findAll();
        //$jugador=$jugadorModel->find('1');
        //var_dump($jugadores);
        $jugadores=array('jugadores'=>$jugadores);
        return view('socio/ver_jugadores', $jugadores);
    }
    
    public function mostrarCampeonatos()
    {
        $titulo = [ 
            'title' => 'Campeonatos',
        ];

        return view('socio/ver_campeonatos', $titulo);
    }

    public function verPartidos()
    {
        $db = db_connect();
        //EQUIPOS ULTIMOS PARTIDOS
        $query1 = $db->query('select
        p.id as partido_id,
        e1.nombre AS equipo_local,
        SUM(CASE WHEN g.jugador_id_fk IS NOT NULL THEN 1 ELSE 0 END) AS goles_equipo_local,
        e2.nombre AS equipo_visita,
        SUM(CASE WHEN g.jugador_id_fk IS NULL THEN 1 ELSE 0 END) AS goles_equipo_visita,
        p.fecha 
        FROM
            partidos p
        INNER JOIN equipos e1 ON
            p.equipo_local_fk = e1.id
        INNER JOIN equipos e2 ON
            p.equipo_visita_fk = e2.id
        LEFT JOIN goles g ON
            p.id = g.partido_id_fk
        WHERE
            p.fecha <= NOW()
        GROUP BY
            p.id,
            e1.nombre,
            e2.nombre
        ORDER BY
            p.fecha DESC;');

        $results1 = $query1->getResult();

        $data1['results1'] = array();

        foreach ($results1 as $row1) {
            $data1['results1'][] = array(
                'partido_id' => $row1->partido_id,
                'equipo_local' => $row1->equipo_local,
                'goles_equipo_local' => $row1->goles_equipo_local,
                'equipo_visita' => $row1->equipo_visita,
                'goles_equipo_visita' => $row1->goles_equipo_visita,
                'fecha' => $row1->fecha
            );
        }

        //GOLES TOTAL EQUIPO LOCAL  
        $query2 = $db->query('SELECT
        e1.nombre AS nombre_equipo,
        CONCAT(j.numero_camiseta, " ", u.nombres, " ", u.apellidos) AS nombre_jugador,
        g.minuto AS minuto_gol,
        p.fecha
        FROM
            partidos p
        INNER JOIN equipos e1 ON
            p.equipo_local_fk = e1.id
        LEFT JOIN goles g ON
            p.id = g.partido_id_fk
        LEFT JOIN jugadores j ON
            j.id = g.jugador_id_fk
        LEFT JOIN usuarios u ON
            j.id = u.jugador_id_fk 
        WHERE
            p.fecha <= NOW()
            AND g.jugador_visita IS NULL
        ORDER BY
            p.fecha desc, g.minuto asc;');

        $results2 = $query2->getResult();

        // Preparar los datos en un formato adecuado
        $data2['results2'] = array();

        foreach ($results2 as $row2) {
            $data2['results2'][] = array(
                'nombre_equipo' => $row2->nombre_equipo,
                'nombre_jugador' => $row2->nombre_jugador,
                'minuto_gol' => $row2->minuto_gol,
                'fecha' => $row2->fecha 
            );
        }

        //GOLES TOTAL EQUIPO VISITANTE
        $query3 = $db->query('SELECT
        e2.nombre AS nombre_equipo,
        g.jugador_visita AS nombre_jugador,
        g.minuto AS minuto_gol,
        p.fecha
        FROM
            partidos p
        INNER JOIN equipos e2 ON
            p.equipo_visita_fk = e2.id
        LEFT JOIN goles g ON
            p.id = g.partido_id_fk
        WHERE
            p.fecha <= NOW()
            AND g.jugador_id_fk IS NULL
        ORDER BY
            p.fecha desc, g.minuto asc;');

        $results3 = $query3->getResult();

        // Preparar los datos en un formato adecuado
        $data3['results3'] = array();

        foreach ($results3 as $row3) {
            $data3['results3'][] = array(
                'nombre_equipo' => $row3->nombre_equipo,
                'nombre_jugador' => $row3->nombre_jugador,
                'minuto_gol' => $row3->minuto_gol,
                'fecha' => $row3->fecha
                
            );
        }

        //CAMBIOS EQUIPO LOCAL
        $query4 = $db->query('SELECT
        CONCAT(j2.numero_camiseta, " ", u_sal.nombres, " ", u_sal.apellidos) AS jugador_saliente,
        CONCAT(j.numero_camiseta, " ", u_ent.nombres, " ", u_ent.apellidos) AS jugador_entrante,
        c.minuto,
        p.fecha
        FROM
            partidos p
        INNER JOIN cambios c ON
            p.id = c.partido_fk
        LEFT JOIN usuarios u_sal ON
            c.jugador_saliente_fk = u_sal.jugador_id_fk
        LEFT JOIN usuarios u_ent ON
            c.jugador_entrante_fk = u_ent.jugador_id_fk
        LEFT JOIN jugadores j ON
            c.jugador_entrante_fk = j.id 
        LEFT JOIN jugadores j2 ON
            c.jugador_saliente_fk = j2.id 
        WHERE
            p.fecha <= NOW()
        ORDER BY
            p.fecha desc,
            c.minuto asc;
        ');

        $results4 = $query4->getResult();

        // Preparar los datos en un formato adecuado
        $data4['results4'] = array();

        foreach ($results4 as $row4) {
            $data4['results4'][] = array(
                'jugador_saliente' => $row4->jugador_saliente,
                'jugador_entrante' => $row4->jugador_entrante,
                'minuto' => $row4->minuto,
                'fecha' => $row4->fecha
            );
        }
        //CAMBIOS EQUIPO VISITANTE
        $query5 = $db->query('SELECT
        e.nombre AS nombre_equipo,
        ce.nombre_jugador_saliente,
        ce.nombre_jugador_entrante,
        ce.minuto,
        p.fecha
        FROM
            cambios_externo ce
        INNER JOIN partidos p ON
            ce.partido_id_fk = p.id
        LEFT JOIN equipos e ON
            e.id = p.equipo_visita_fk
        WHERE
            p.fecha <= NOW()
        ORDER BY
            p.fecha DESC, ce.minuto ASC;');

        $results5 = $query5->getResult();

        // Preparar los datos en un formato adecuado
        $data5['results5'] = array();

        foreach ($results5 as $row5) {
            $data5['results5'][] = array(
                'nombre_equipo' => $row5->nombre_equipo,
                'jugador_saliente' => $row5->nombre_jugador_saliente,
                'jugador_entrante' => $row5->nombre_jugador_entrante,
                'minuto' => $row5->minuto,
                'fecha' => $row5->fecha
            );
        }
        //TARJETAS EQUIPO LOCAL
        $query6 = $db->query('SELECT
        CONCAT(u.nombres, " ", u.apellidos) AS jugador,
        tp.tarjeta,
        tp.minuto,
        el.nombre AS equipo,
        p.fecha
        FROM
            tarjetas_partido tp
        LEFT JOIN jugadores j ON
            j.id = tp.jugador_fk
        LEFT JOIN usuarios u ON
            u.jugador_id_fk = j.id
        LEFT JOIN partidos p ON
            p.id = tp.partido_fk
        LEFT JOIN equipos el ON
            el.id = p.equipo_local_fk
        LEFT JOIN equipos ev ON
            ev.id = p.equipo_visita_fk
        WHERE
            p.fecha <= NOW()
            AND tp.jugador_fk IS NOT NULL
        ORDER BY
            p.fecha DESC, tp.minuto asc;');

        $results6 = $query6->getResult();

        // Preparar los datos en un formato adecuado
        $data6['results6'] = array();

        foreach ($results6 as $row6) {
            $data5['results6'][] = array(
                'jugador' => $row6->jugador,
                'tarjeta' => $row6->tarjeta,
                'minuto' => $row6->minuto,
                'equipo' => $row6->equipo,
                'fecha' => $row6->fecha
            );
        }
        //TARJETAS EQUIPO VISITA
        $query7 = $db->query('SELECT
        CASE
            WHEN tp.jugador_fk IS NOT NULL THEN CONCAT(u.nombres, " ", u.apellidos)
            ELSE tp.jugador_externo
        END AS jugador,
        tp.tarjeta,
        tp.minuto,
        ev.nombre AS equipo,
        p.fecha
        FROM
            tarjetas_partido tp
        LEFT JOIN jugadores j ON
            j.id = tp.jugador_fk
        LEFT JOIN usuarios u ON
            u.jugador_id_fk = j.id
        LEFT JOIN partidos p ON
            p.id = tp.partido_fk
        LEFT JOIN equipos el ON
            el.id = p.equipo_local_fk
        LEFT JOIN equipos ev ON
            ev.id = p.equipo_visita_fk
        WHERE
            p.fecha <= NOW() 
            AND p.fecha <= (
                SELECT
                    MAX(fecha)
                FROM
                    partidos
                WHERE
                    fecha <= NOW()
            )
            AND tp.jugador_fk IS NULL
        ORDER BY
            p.fecha DESC, tp.minuto ASC;');

        $results7 = $query7->getResult();

        // Preparar los datos en un formato adecuado
        $data7['results7'] = array();

        foreach ($results7 as $row7) {
            $data7['results7'][] = array(
                'jugador' => $row7->jugador,
                'tarjeta' => $row7->tarjeta,
                'minuto' => $row7->minuto,
                'equipo' => $row7->equipo,
                'fecha' => $row7->fecha
            );
        }
        //Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Partidos',
        ];

        $verPartidos = array_merge($data1, $data2, $data3, $data4, $data5, $data6, $data7, $titulo);

        return view('socio/ver_partidos', $verPartidos);
    }

    public function verReportes()
    {
        //Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Reportes',
        ];

        return view('templates/reportes', $titulo);
    }


}