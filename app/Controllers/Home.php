<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
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

        $query2 = $db->query('SELECT
        e1.nombre AS nombre_equipo,
        CONCAT(j.numero_camiseta, " ", u.nombres, " ", u.apellidos) AS nombre_jugador,
        g.minuto as minuto_gol
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
            p.fecha = (
                SELECT
                    MAX(fecha)
                FROM
                    partidos
            )
        AND g.jugador_visita IS NULL;');

        $results2 = $query2->getResult();

        // Preparar los datos en un formato adecuado
        $data2['results2'] = array();

        foreach ($results2 as $row) {
            $data2['results2'][] = array(
                'nombre_equipo' => $row->nombre_equipo,
                'minuto_gol' => $row->minuto_gol,
                'nombre_jugador' => $row->nombre_jugador
            );
        }

        $query6 = $db->query('SELECT
        e2.nombre AS nombre_equipo,
        g.jugador_visita AS nombre_jugador,
        g.minuto as minuto_gol
        FROM
            partidos p
        INNER JOIN equipos e2 ON
            p.equipo_visita_fk = e2.id
        LEFT JOIN goles g ON
            p.id = g.partido_id_fk
        WHERE
            p.fecha = (
                SELECT
                    MAX(fecha)
                FROM
                    partidos
            )
        AND g.jugador_id_fk IS NULL;');

        $results6 = $query6->getResult();

        // Preparar los datos en un formato adecuado
        $data6['results6'] = array();

        foreach ($results6 as $row) {
            $data6['results6'][] = array(
                'nombre_equipo' => $row->nombre_equipo,
                'minuto_gol' => $row->minuto_gol,
                'nombre_jugador' => $row->nombre_jugador
            );
        }


        $query3 = $db->query('SELECT
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
    
        $results3 = $query3->getResult();

        // Preparar los datos en un formato adecuado
        $data3['results3'] = array();

        foreach ($results3 as $row) {
            $data3['results3'][] = array(
                'jugador_saliente' => $row->jugador_saliente,
                'jugador_entrante' => $row->jugador_entrante,
                'minuto' => $row->minuto
            );
        }

        $query4 = $db->query('select e.nombre as nombre_equipo,
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

        $results4 = $query4->getResult();

        // Preparar los datos en un formato adecuado
        $data4['results4'] = array();

        foreach ($results4 as $row) {
            $data4['results4'][] = array(
                'nombre_equipo' => $row->nombre_equipo,
                'jugador_saliente' => $row->nombre_jugador_saliente,
                'jugador_entrante' => $row->nombre_jugador_entrante,
                'minuto' => $row->minuto
            );
        }

        $query5 = $db->query('SELECT
        CONCAT(u.nombres, " ", u.apellidos) AS jugador,
        tp.tarjeta AS tarjeta,
        tp.minuto AS minuto,
        el.nombre AS equipo
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
            p.fecha = (
                SELECT
                    MAX(fecha)
                FROM
                    partidos
            )
        AND el.id = 10
        AND tp.jugador_fk IS NOT NULL;');

        $results5 = $query5->getResult();

        // Preparar los datos en un formato adecuado
        $data5['results5'] = array();

        foreach ($results5 as $row) {
            $data5['results5'][] = array(
                'jugador' => $row->jugador,
                'tarjeta' => $row->tarjeta,
                'minuto' => $row->minuto,
                'equipo' => $row->equipo
            );
        }

        $query7 = $db->query('SELECT
        CASE
            WHEN tp.jugador_fk IS NOT NULL THEN CONCAT(u.nombres, " ", u.apellidos)
            ELSE tp.jugador_externo
        END AS jugador,
        tp.tarjeta AS tarjeta, 
        tp.minuto AS minuto,
        ev.nombre AS equipo
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
            p.fecha = (
                SELECT
                    MAX(fecha)
                FROM
                    partidos
            )
        AND tp.jugador_fk IS NULL;');

        $results7 = $query7->getResult();

        // Preparar los datos en un formato adecuado
        $data7['results7'] = array();

        foreach ($results7 as $row) {
            $data7['results7'][] = array(
                'jugador' => $row->jugador,
                'tarjeta' => $row->tarjeta,
                'minuto' => $row->minuto,
                'equipo' => $row->equipo
            );
        }

        $viewData = array_merge($data, $data2, $data3, $data4, $data5, $data6, $data7);

        echo view('templates/header');
        echo view('home/home', $viewData);
        echo view('templates/footer');
    }


    public function homesocios()
    {
        return view('templates/header').view('home/home_socios').view('templates/footer');
    }

    public function homeiniciosesion()
    {
        return view('home/iniciar_sesion');
    }

    public function homeregistro()
    {
        return view('home/registrarse');
    }

    //INICIAR SESION
    public function validarIngreso()
    {
        $email1 = $this->request->getPost("email");
        if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email1, FILTER_SANITIZE_EMAIL);
            $this->usuario = new UsuarioModel();
            $resultadoUsuario = $this->usuario->buscarUsuarioPorEmail($email);
        } else {
            $data = ['tipo' => 'danger', 'mensaje' => 'Usuario  y/o clave invalido'];
            return view(('home/iniciar_sesion'), $data);
        }

        if ($resultadoUsuario) {
            $encrypter = \config\Services::encrypter();
            $claveBD = $encrypter->decrypt(hex2bin($resultadoUsuario->password_hash));


            $clave = $this->request->getPost("password");
            if ($clave == $claveBD) {
                $data = [
                    "nombreUsuario" => $resultadoUsuario->nombres . ' ' . $resultadoUsuario->apellidos,
                    "emailUsuario" => $resultadoUsuario->email
                ];
                session()->set($data);

                //Buscar rol del usuario

                // $database = \Config\Database::connect();
                // $query = ($database->table('usuarios')->select('rol')->where('email', $email1));
                // $this->$database->select('rol')->from('usuarios')->where('email', $email1);
                // $query = $this->$database->get();
                //Control de vistas por Rol
                // if ($query) {
                //     switch ($query) {
                //         case  1:
                //             //redirecciona a vista de administrador
                //             return redirect()->to(base_url() . '/ ');

                //         case 'direccion':
                //             //redirecciona a vista de direccion 
                //             return redirect()->to(base_url() . '/ ');

                //         case 'jugador':
                //             //redirecciona a vista de jugador
                //             return redirect()->to(base_url() . '/ ');

                //         case 'entrenador':
                //             //redirecciona a vista de entrenador
                //             return redirect()->to(base_url() . '/ ');

                //         case 'equipo_tecnico':
                //             //redirecciona a vista de equipo_tecnico
                //             return redirect()->to(base_url() . '/ ');

                //         case 'socio':
                //             //redirecciona a vista de socio
                //             return redirect()->to(base_url() . '/ ');
                //     }
                // }

                return redirect()->to(base_url() . 'InicioSocios');
            } else {
                $data = ['tipo' => 'danger', 'mensaje' => 'clave y/o usuario invalido '];
                return view(('home/iniciar_sesion'),  $data);
            }
        } else {
            // print_r($_POST);
            $data = ['tipo' => 'danger', 'mensaje' => 'Usuario  y/o clave invalido'];
            return view(('home/iniciar_sesion'), $data);
        }
    }
    
    //Cerrar Sesion (General)
    public function cerrarSesion()
    {
        session()->destroy();
        return redirect()->to(base_url() . 'Home');
    }

    //REGISTRARSE
    public function register()
    {
        $data = [];

        if ($this->request->getMethod() === 'post') {


            // Validar los datos del formulario
            $rules = [
                'nombres' => 'required',
                'apellidos' => 'required',
                'email' => 'required|valid_email',
                'run' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'password_hash' => 'required'
            ];
            try {
                if ($this->validate($rules)) {
                    $encrypter = \config\Services::encrypter();
                    // Obtener los datos del formulario
                    $firstName = $this->request->getPost('nombres');
                    $lastName = $this->request->getPost('apellidos');
                    $email = $this->request->getPost('email');
                    $run = $this->request->getPost('run');
                    $address = $this->request->getPost('direccion');
                    $phone = $this->request->getPost('telefono');
                    $clave = $this->request->getPost('password_hash');
                    $password = bin2hex($encrypter->encrypt($clave));
                    // Guardar los datos en la base de datos
                    $userModel = new UsuarioModel();
                    $userData = [
                        'nombres' => $firstName,
                        'apellidos' => $lastName,
                        'email' => $email,
                        'run' => $run,
                        'direccion' => $address,
                        'telefono' => $phone,
                        'password_hash' => $password,
                        'rol' => 'socio'
                    ];
                    $database = \Config\Database::connect();
                    $queryEmail = $database->table('usuarios')->where('email', $email)->get();



                    if ($queryEmail->getNumRows() > 0) {
                        $data = ['tipo' => 'danger', 'mensaje' => 'El correo electrónico está duplicado '];
                        return view(('home/registrarse'), $data);
                    } else {
                        try {
                            $userModel->insert($userData);
                            return redirect()->to('IniciarSesion');
                        } catch (\Exception $e) {
                            $data = ['tipo' => 'danger', 'mensaje' => 'Error al registrar usuario '];
                            return view(('home/registrarse'), $data);
                        }
                    }


                    // Redirigir al usuario a una página de éxito o mostrar un mensaje
                    // de éxito en la misma página.

                } else {
                    $data = ['tipo' => 'danger', 'mensaje' => 'Datos invalidos '];
                    return view(('home/registrarse'), $data);
                }
            } catch (\Exception $data) {
                $data = ['tipo' => 'danger', 'mensaje' => 'Error al registrar usuario '];
                return view(('home/registrarse'), $data);
            }
            // Cargar la vista del formulario de registro

        }
        return view('home/registrarse', $data);
    }
}