<?php

namespace App\Controllers;

use App\Models\IngresosModel;
use App\Models\UsuarioModel;
use App\Models\JugadorModel;
use App\Models\PartidosModel;
use CodeIgniter\Controller;
use App\Models\PagoSocioModel;
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
       // Agregando Titulo a Cada View
       $titulo = [ 
        'title' => 'Campeonatos Socio',
        ];

        $db = db_connect();

        $campeonato = $db->query('SELECT
        e.nombre AS equipo,
        COUNT(*) AS partidos_jugados,
        SUM(CASE
            WHEN (r.goles_local > r.goles_visita AND r.equipo_local_fk = e.id)
                OR (r.goles_visita > r.goles_local AND r.equipo_visita_fk = e.id) THEN 1
            ELSE 0
        END) AS partidos_ganados,
        
        SUM(CASE
            WHEN r.goles_local = r.goles_visita THEN 1
            ELSE 0
        END) AS partidos_empatados,
        
        SUM(CASE
            WHEN (r.goles_local < r.goles_visita AND r.equipo_local_fk = e.id)
                OR (r.goles_visita < r.goles_local AND r.equipo_visita_fk = e.id) THEN 1
            ELSE 0
        END) AS partidos_perdidos,

        SUM(CASE
            WHEN r.equipo_local_fk = e.id THEN r.goles_local
            WHEN r.equipo_visita_fk = e.id THEN r.goles_visita
            ELSE 0
        END) AS goles_a_favor,

        SUM(CASE
            WHEN r.equipo_local_fk = e.id THEN r.goles_visita
            WHEN r.equipo_visita_fk = e.id THEN r.goles_local
            ELSE 0
        END) AS goles_en_contra,
        
        SUM(CASE
            WHEN r.equipo_local_fk = e.id THEN r.goles_local - r.goles_visita
            WHEN r.equipo_visita_fk = e.id THEN r.goles_visita - r.goles_local
            ELSE 0
        END) AS diferencia_goles,

        SUM(CASE
        WHEN (r.goles_local > r.goles_visita AND r.equipo_local_fk = e.id)
            OR (r.goles_visita > r.goles_local AND r.equipo_visita_fk = e.id) THEN 3
        WHEN r.goles_local = r.goles_visita AND r.equipo_local_fk = e.id THEN 1
        WHEN r.goles_local = r.goles_visita AND r.equipo_visita_fk = e.id THEN 1
        ELSE 0
        END) AS puntaje
    
        FROM
            resultados r
        INNER JOIN equipos e ON r.equipo_local_fk = e.id OR r.equipo_visita_fk = e.id
        WHERE
            r.campeonato_id_fk = 1
        GROUP BY
            e.id, e.nombre
        ORDER BY
            puntaje DESC, diferencia_goles desc;');

        $results = $campeonato->getResult();

        // Preparar los datos en un formato adecuado
        $data['results'] = array();

        foreach ($results as $row) {
            $data['results'][] = array(
                'equipo' => $row->equipo,
                'partidos_jugados' => $row->partidos_jugados,
                'partidos_ganados' => $row->partidos_ganados,
                'partidos_empatados' => $row->partidos_empatados,
                'partidos_perdidos' => $row->partidos_perdidos,
                'goles_a_favor' => $row->goles_a_favor,
                'goles_en_contra' => $row->goles_en_contra,
                'diferencia_goles' => $row->diferencia_goles,
                'puntaje' => $row->puntaje
            );
        }

        $viewData = array_merge($data, $titulo);

        return view('socio/ver_campeonatos', $viewData);
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

    protected $usuario;
    protected $pagoSocio;
    protected $ingresoModel;
    public function verMensualidad()
    {

        $titulo = [
            'title' => 'Mensualidad',
        ];
        $data = [];
        if ($this->request->getMethod() === 'post') {

            try {
                // Guardar los datos en la base de datos

                $email = session('emailUsuario');
                $this->pagoSocio = new PagoSocioModel();
                $this->usuario = new UsuarioModel();
                $this->ingresoModel = new IngresosModel();
                $resultadoUsuario = $this->usuario->buscarUsuarioPorEmail($email);
                $id = $resultadoUsuario->id;
                $montopredeterminado = $this->pagoSocio->select('monto')->first();

                $ingresoData = [
                    'monto' => $montopredeterminado,
                    'concepto' => 'mensualidad',
                    'fecha' => date('Y-m-d'),
                    'id_usuario' => $id
                ];


                if ($montopredeterminado = null) {
                    echo '<script>alert("Ingreso no válido");</script>';
                    return view('socio/ver_mensualidad');
                }

                try {
                    $this->ingresoModel->insert($ingresoData);
                    return redirect()->to('InicioSocios')->with('success', 'pago hecho correctamente');
                } catch (\Exception $e) {

                    return view(('socio/ver_mensualidad'));
                }
                // Redirigir al usuario a una página de éxito o mostrar un mensaje
                // de éxito en la misma página.
            } catch (\Exception $data) {
                $data = ['tipo' => 'danger', 'mensaje' => 'Error al registrar monto '];
                return view(('socio/ver_mensualidad'), $data);
            }
            // Cargar la vista del formulario de registro

        }
        return view('socio/ver_mensualidad', $titulo);
    }
}
