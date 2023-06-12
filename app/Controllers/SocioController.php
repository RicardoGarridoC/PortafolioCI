<?php namespace App\Controllers;

use App\Models\JugadorModel;
use App\Models\PartidosModel;
use CodeIgniter\Controller;
use App\Models\CustomModel;



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
        // Agregando Titulo a Cada View
        $titulo = [ 
        'title' => 'Jugadores Socio',
        ];

        $db = db_connect();
        $jugadorModel = new CustomModel($db);
        $jugadores = $jugadorModel->getJugadores();
        $jugadores=array('jugadores' => $jugadores);

        //$jugadorModel = new JugadorModel();
        //$jugadores=$jugadorModel->findAll();
        //$jugadores=array('jugadores'=>$jugadores);
        //return view('admin/admin_equipotecnico_dt', ['jugadores' => $jugadores]);

        $verData= array_merge($jugadores, $titulo);
        return view('socio/ver_jugadores', $verData);
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
        $partidosModel = new PartidosModel();
        $partidos = $partidosModel->findAll();

        // Pasar los datos a la vista
        $data['partidos'] = $partidos;

        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Partidos',
        ];

        $verPartidos = array_merge($data, $titulo);

        return view('socio/ver_partidos', $verPartidos);
    }

    public function verEstadisticasJugadores()
    {
        $db = db_connect();
        //JUGADORES MASCULINOS

        $query = $db->query('SELECT
        u.nombres AS nombre,
        u.apellidos AS apellido,
        j.sueldo,
        j.ayuda_economica,
        j.posicion,
        COUNT(g.jugador_id_fk) AS goles,
        CASE
          WHEN l.fecha_fin_lesion > CURDATE() THEN "si"
          ELSE "no"
        END AS jugador_lesionado,
        CASE
          WHEN l.fecha_fin_lesion > CURDATE() THEN l.fecha_inicio_lesion
          ELSE NULL
        END AS fecha_inicio_lesion,
        CASE
          WHEN l.fecha_fin_lesion > CURDATE() THEN l.fecha_fin_lesion
          ELSE NULL
        END AS fecha_fin_lesion
        FROM
            jugadores j
            INNER JOIN usuarios u ON j.id = u.jugador_id_fk
            LEFT JOIN goles g ON j.id = g.jugador_id_fk
            LEFT JOIN lesiones l ON j.id = l.jugador_id_fk
        WHERE
            j.genero = "masculino"
        GROUP BY
            j.id;');

        $masculinos = $query->getResult();

        // Preparar los datos en un formato adecuado
        $data1['masculinos'] = array();

        foreach ($masculinos as $masculino) {
            $data1['masculinos'][] = array(
                'nombre' => $masculino->nombre,
                'apellido' => $masculino->apellido,
                'sueldo' => $masculino->sueldo,
                'ayuda_economica' => $masculino->ayuda_economica,
                'posicion' => $masculino->posicion,
                'goles' => $masculino->goles,
                'jugador_lesionado' => $masculino->jugador_lesionado,
                'fecha_inicio_lesion' => $masculino->fecha_inicio_lesion,
                'fecha_fin_lesion' => $masculino->fecha_fin_lesion
            );
        }
        
        //JUGADORES FEMENINOS
        $query2 = $db->query('SELECT
        u.nombres AS nombre,
        u.apellidos AS apellido,
        j.sueldo,
        j.ayuda_economica,
        j.posicion,
        COUNT(g.jugador_id_fk) AS goles,
        CASE
          WHEN l.fecha_fin_lesion > CURDATE() THEN "si"
          ELSE "no"
        END AS jugador_lesionado,
        CASE
          WHEN l.fecha_fin_lesion > CURDATE() THEN l.fecha_inicio_lesion
          ELSE NULL
        END AS fecha_inicio_lesion,
        CASE
          WHEN l.fecha_fin_lesion > CURDATE() THEN l.fecha_fin_lesion
          ELSE NULL
        END AS fecha_fin_lesion
        FROM
            jugadores j
            INNER JOIN usuarios u ON j.id = u.jugador_id_fk
            LEFT JOIN goles g ON j.id = g.jugador_id_fk
            LEFT JOIN lesiones l ON j.id = l.jugador_id_fk
        WHERE
            j.genero = "femenino"
        GROUP BY
            j.id;');

        $femeninos = $query2->getResult();

        // Preparar los datos en un formato adecuado
        $data2['femeninos'] = array();

        foreach ($femeninos as $femenino) {
            $data2['femeninos'][] = array(
                'nombre' => $femenino->nombre,
                'apellido' => $femenino->apellido,
                'sueldo' => $femenino->sueldo,
                'ayuda_economica' => $femenino->ayuda_economica,
                'posicion' => $femenino->posicion,
                'goles' => $femenino->goles,
                'jugador_lesionado' => $femenino->jugador_lesionado,
                'fecha_inicio_lesion' => $femenino->fecha_inicio_lesion,
                'fecha_fin_lesion' => $femenino->fecha_fin_lesion
            );
        }

        //Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Estadistica de Jugadores',
        ];

        $verData = array_merge($data1, $data2, $titulo);

        return view('socio/ver_estadisticas.php', $verData);
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