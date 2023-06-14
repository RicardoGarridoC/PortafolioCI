<?php

namespace App\Controllers;

use App\Models\IngresosModel;
use App\Models\UsuarioModel;
use App\Models\JugadorModel;
use App\Models\PartidosModel;
use CodeIgniter\Controller;
use App\Models\PagoSocioModel;
use App\Models\CustomModel;
use Dompdf\Dompdf as Dompdf;


require 'vendor/autoload.php';




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
        $jugadores = array('jugadores' => $jugadores);

        //$jugadorModel = new JugadorModel();
        //$jugadores=$jugadorModel->findAll();
        //$jugadores=array('jugadores'=>$jugadores);
        //return view('admin/admin_equipotecnico_dt', ['jugadores' => $jugadores]);

        $verData = array_merge($jugadores, $titulo);
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
        if ($this->request->getMethod() === 'post') {

            try {
                /* Guardar los datos en la base de datos*/

                //Sesion de usuario para obtener el email
                $email = session('emailUsuario');

                //carga de modelos 
                $this->pagoSocio = new PagoSocioModel();
                $this->usuario = new UsuarioModel();
                $this->ingresoModel = new IngresosModel();

                //obtener datos de usuario a traves de la session
                $resultadoUsuario = $this->usuario->buscarUsuarioPorEmail($email);
                $id = $resultadoUsuario->id;
                $montopredeterminado = $this->pagoSocio->select('monto')->first();
                $nombre = $resultadoUsuario->nombres . ' ' . $resultadoUsuario->apellidos;
                $fecha = date('Y-m-d');
                $ingresoData = [
                    'monto' => $montopredeterminado,
                    'concepto' => 'mensualidad',
                    'fecha' => $fecha,
                    'id_usuario_fk' => $id,
                    'detalle' => 'Pago de mensualidad'
                ];
                //validacion de datos
                if ($montopredeterminado = null) {
                    echo '<script>alert("Ingreso no válido");</script>';
                    return view('socio/ver_mensualidad');
                }


                if ($this->ingresoModel->insert($ingresoData)) {

                    $dompdf = new DOMPDF();
                    //Aqui con las variables no imprime la informacion, pero con solo  html, imprime bien.   
                    $dompdf->loadHtml(`<!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="UTF-8">
                        <title>Boleta</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                            }
                            .container {
                                margin: 20px;
                            }
                            .header {
                                text-align: center;
                                margin-bottom: 20px;
                            }
                           
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <div class="header">
                                <h1>Boleta de Venta</h1>
                            </div>
                            <div class="customer-info">
                                <p><strong>Nombre:</strong> {$nombre}</p>
                                <p><strong>Monto:</strong> {$montopredeterminado}</p>
                                <p><strong>Fecha:</strong> {$fecha}</p>
                            </div>
                        </div>
                    </body>
                    </html>
                     `);
                    $dompdf->setPaper('A4', 'portrait');
                    $dompdf->render();
                    $dompdf->stream();


                    echo '<script>alert("Mensualidad pagada con exito.");</script>';

                    return view(('socio/inicio_socios'));
                } else {
                    return view(('socio/ver_mensualidad'));
                }

                // Redirigir al usuario a una página de éxito o mostrar un mensaje
                // de éxito en la misma página.
            } catch (\Exception $e) {
                echo '<script>alert("Ingreso no válido");</script>';
                return view(('socio/ver_mensualidad'));
            }
            // Cargar la vista del formulario de registro

        }
        return view('socio/ver_mensualidad', $titulo);
    }

    public function verSocioUsuario()
    {
        $titulo = [
            'title' => 'Ver Usuario Socio',
        ];
    
        //  Obtén una instancia del encrypter
        $encrypter = \Config\Services::encrypter();
    
        // Desencripta la contraseña almacenada en la sesión
        $encryptedPassword = session('passwordUsuario');
        $clavebuena = $encrypter->decrypt(hex2bin($encryptedPassword));
    
        // Combina los datos en un solo array
        $verCosas = array_merge(['clavebuena' => $clavebuena], $titulo);
    
        return view('socio/socio_ver_perfil', $verCosas);
    }
    
    public function socioverEstadisticas()
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
            'title' => 'Ver Estadisticas Socio',
        ];

        $verData = array_merge($data1, $data2, $titulo);

        return view('socio/socio_ver_estadisticas', $verData);
    }

    public function guardaSocioUsuario()
    {

        $usuarioModel = new UsuarioModel();
        $request = \Config\Services::request();
        $encrypter = \config\Services::encrypter();
        $data = array(
            'nombres' => $request->getPostGet('nombres'),
            'apellidos' => $request->getPostGet('apellidos'),
            'email' => $request->getPostGet('email'),
            'run' => $request->getPostGet('run'),
            'direccion' => $request->getPostGet('direccion'),
            'telefono' => $request->getPostGet('telefono'),
            //'password_hash' => $request->getPostGet('password_hash'),
            $clave = $this->request->getPost('password_hash'),
            $password = bin2hex($encrypter->encrypt($clave)),
            'password_hash' => $password
        );
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        if ($usuarioModel->save($data) === false) {
            var_dump($usuarioModel->errors());
        }

        //Agregando Titulo a Cada View
        $titulo = [
            'title' => 'Editar Usuario Socio',
        ];

        return view('socio/socio_ver_perfil', $titulo);
    }
    public function __construct()
    {
        helper('form');
        //helper('encryption');
    }

}
