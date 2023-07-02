<?php

namespace App\Controllers;

use App\Models\JugadorModel;
use App\Models\EquipoModel;
use App\Models\UsuarioModel;
use App\Models\EquipoTecnicoModel;
use App\Models\SocioModel;
use App\Models\CustomModel;
use App\Models\PartidosModel;
use App\Models\ResultadosModel;
use App\Models\CambiosModel;
use App\Models\CambiosExternosModel;
use App\Models\CampeonatoModel;
use App\Models\CanchaModel;
use App\Models\DivisionModel;
use App\Models\DirigenteModel;
use App\Models\EgresoModel;
use App\Models\GolesModel;
use App\Models\IngresoModel;
use App\Models\LesionesModel;
use App\Models\MotivoModel;
use App\Models\PagoSocioModel;
use App\Models\PartidoModel;
use App\Models\SouvenirModel;
use App\Models\SponsorModel;
use App\Models\TarjetasPartidoModel;
use App\Models\TraspasoModel;


class AdminDashboard extends BaseController
{
    public function Dashboard()
    {
        $titulo = [
            'title' => 'Ver Usuario Admin',
        ];

        return view('admin/admin_dashboard', $titulo);
    }

    public function equipoDatabase()
    {
        $titulo = [
            'title' => 'Ver Equipos Admin',
        ];

        $equipoModel = new EquipoModel();
        $equipos = $equipoModel->findAll();
        $equipos = array('equipos' => $equipos);

        $viewData = array_merge($titulo, $equipos);

        return view('admin/admin_equipo_dt', $viewData);
    }

    public function __construct()
    {
        helper(['form', 'encryption']);

        //$this->encryption = \Config\Services::encryption();
    }

    public function usuarioDatabase()
    {
        $titulo = [
            'title' => 'Ver Usuarios Admin',
        ];

        $usuarioModel = new UsuarioModel();
        $encrypter = \config\Services::encrypter();
        $usuarios = $usuarioModel->findAll();
        $usuarios = array('usuarios' => $usuarios);

        foreach ($usuarios['usuarios'] as &$usuario) {
            $encryptedPassword = $usuario['password_hash'];
            $usuario['clavebuena'] = $encrypter->decrypt(hex2bin($encryptedPassword));
        }

        $data = ['usuarios' => $usuarios['usuarios']];

        $viewData = array_merge($titulo, $data);

        return view('admin/admin_usuarios_dt', $viewData);
    }

    public function jugadorDataBase()
    {

        $titulo = [
            'title' => 'Ver Jugadores Admin',
        ];

        $jugadorModel = new JugadorModel();
        $jugadores = $jugadorModel->findAll();
        $jugadores = array('jugadores' => $jugadores);

        $viewData = array_merge($titulo, $jugadores);
        return view('admin/admin_jugador_dt', $viewData);
    }

    public function equipotecnicoDatabase()
    {

        $db = db_connect();
        $equipotecnicoModel = new CustomModel($db);
        $equipots = $equipotecnicoModel->getEquipoTecnico();

        $data = [
            'equipots' => $equipots,
            'title' => 'Ver Equipo Tecnico Admin'
        ];

        return view('admin/admin_equipotecnico_dt', $data);

        //$equipotecnicoModel = new EquipoTecnicoModel();
        //$equipots=$equipotecnicoModel->findAll();
        //$equipots=array('equipots'=>$equipots);
        //return view('admin/admin_equipotecnico_dt', $equipots);
    }
    public function socioDatabase()
    {
        $db = db_connect();
        $socioModel = new CustomModel($db);
        $socios = $socioModel->getSocios();

        $data = [
            'socios' => $socios,
            'title' => 'Ver Socio Admin'
        ];
        
        return view('admin/admin_socio_dt', $data);

        //$socioModel = new SocioModel();
        //$socios=$socioModel->findAll();
        //$socios=array('socios'=>$socios);
        //return view('admin/admin_socio_dt', $socios);
    }

    public function resultadoDatabase()
    {
        //$db = db_connect();
        $resultadoModel = new ResultadosModel();
        //$resultados = $resultadoModel->getResultados();
        $resultados = $resultadoModel->findAll();

        $data = [
            'resultados' => $resultados,
            'title' => 'Ver Resultados Admin'
        ];

        return view('admin/admin_resultados_dt', $data);
    }

    public function cambioDatabase()
    {
        $cambioModel = new CambiosModel();
        $cambios = $cambioModel->findAll();

        $data = [
            'cambios' => $cambios,
            'title' => 'Ver Cambios Admin'
        ];

        return view('admin/admin_cambios_dt', $data);
    }

    public function cambioexternoDatabase()
    {
        $cambioexternoModel = new CambiosExternosModel();
        $cambiosexternos = $cambioexternoModel->findAll();

        $data = [
            'cambiosexternos' => $cambiosexternos,
            'title' => 'Ver Cambios Externos Admin'
        ];

        return view('admin/admin_cambiosexternos_dt', $data);
    }

    public function campeonatoDatabase()
    {
        $campeonatoModel = new CampeonatoModel();
        $campeonatos = $campeonatoModel->findAll();

        $data = [
            'campeonatos' => $campeonatos,
            'title' => 'Ver Campeonatos Admin'
        ];

        return view('admin/admin_campeonatos_dt', $data);
    }

    public function canchaDatabase()
    {
        $canchaModel = new CanchaModel();
        $canchas = $canchaModel->findAll();
    
        $data = [
            'canchas' => $canchas,
            'title' => 'Ver Canchas Admin'
        ];
    
        return view('admin/admin_canchas_dt', $data);
    }

    public function dirigenteDatabase()
    {
        $dirigenteModel = new DirigenteModel();
        $dirigentes = $dirigenteModel->findAll();

        $data = [
            'dirigentes' => $dirigentes,
            'title' => 'Ver Dirigentes Admin'
        ];

        return view('admin/admin_dirigente_dt', $data);
    }

    public function divisionDatabase()
    {
        $divisionModel = new DivisionModel();
        $divisiones = $divisionModel->findAll();

        $data = [
            'divisiones' => $divisiones,
            'title' => 'Ver Divisiones Admin'
        ];

        return view('admin/admin_division_dt', $data);
    }

    public function egresosDatabase()
    {
        $egresoModel = new EgresoModel();
        $egresos = $egresoModel->findAll();

        $data = [
            'egresos' => $egresos,
            'title' => 'Ver Egresos Admin'
        ];

        return view('admin/admin_egresos_dt', $data);
    }

    public function golesDatabase()
    {
        $golModel = new GolesModel();
        $goles = $golModel->findAll();

        $data = [
            'goles' => $goles,
            'title' => 'Ver Goles Admin'
        ];

        return view('admin/admin_goles_dt', $data);
    }

    public function ingresosDatabase()
    {
        $ingresoModel = new IngresoModel();
        $ingresos = $ingresoModel->findAll();

        $data = [
            'ingresos' => $ingresos,
            'title' => 'Ver Ingresos Admin'
        ];

        return view('admin/admin_ingresos_dt', $data);
    }

    public function lesionesDatabase()
    {
        $lesionModel = new LesionesModel();
        $lesiones = $lesionModel->findAll();

        $data = [
            'lesiones' => $lesiones,
            'title' => 'Ver Lesiones Admin'
        ];

        return view('admin/admin_lesiones_dt', $data);
    }

    public function motivosDatabase()
    {
        $motivoModel = new MotivoModel();
        $motivos = $motivoModel->findAll();

        $data = [
            'motivos' => $motivos,
            'title' => 'Ver Motivos Admin'
        ];

        return view('admin/admin_motivos_dt', $data);
    }

    public function pagosociosDatabase()
    {
        $pagoSocioModel = new PagoSocioModel();
        $pagosocios = $pagoSocioModel->findAll();

        $data = [
            'pagosocios' => $pagosocios,
            'title' => 'Ver Pagos de Socios Admin'
        ];

        return view('admin/admin_pagosocios_dt', $data);
    }

    public function partidosDatabase()
    {
        $partidoModel = new PartidoModel();
        $partidos = $partidoModel->findAll();

        $data = [
            'partidos' => $partidos,
            'title' => 'Ver Partidos Admin'
        ];

        return view('admin/admin_partidos_dt', $data);
    }
    
    public function souvenirsDatabase()
    {
        $souvenirModel = new SouvenirModel();
        $souvenirs = $souvenirModel->findAll();

        $data = [
            'souvenirs' => $souvenirs,
            'title' => 'Ver Souvenirs Admin'
        ];

        return view('admin/admin_souvenirs_dt', $data);
    }

    public function sponsorsDatabase()
    {
        $sponsorModel = new SponsorModel();
        $sponsors = $sponsorModel->findAll();

        $data = [
            'sponsors' => $sponsors,
            'title' => 'Ver Sponsors Admin'
        ];

        return view('admin/admin_sponsors_dt', $data);
    }

    public function tarjetaspartidosDatabase()
    {
        $tarjetaPartidoModel = new TarjetasPartidoModel();
        $tarjetaspartido = $tarjetaPartidoModel->findAll();

        $data = [
            'tarjetaspartido' => $tarjetaspartido,
            'title' => 'Ver Tarjetas de Partidos Admin'
        ];

        return view('admin/admin_tarjetaspartidos_dt', $data);
    }

    public function traspasosDatabase()
    {
        $traspasoModel = new TraspasoModel();
        $traspasos = $traspasoModel->findAll();

        $data = [
            'traspasos' => $traspasos,
            'title' => 'Ver Traspasos Admin'
        ];

        return view('admin/admin_traspasos_dt', $data);
    }


    public function guardaJugador()
    {


        $jugadorModel = new JugadorModel();
        $request = \Config\Services::request();
        $data = array(
            'posicion' => $request->getPostGet('posicion'),
            'partidos_jugados' => $request->getPostGet('partidos_jugados'),
            'tipo' => $request->getPostGet('tipo'),
            'sueldo' => $request->getPostGet('sueldo'),
            'ayuda_economica' => $request->getPostGet('ayuda_economica'),
            'numero_camiseta' => $request->getPostGet('numero_camiseta'),
            'equipo_proviene_id_fk' => $request->getPostGet('equipo_proviene_id_fk')

        );
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        if ($jugadorModel->save($data) === false) {
            var_dump($jugadorModel->errors());
        }

        $titulo = [
            'title' => 'Ver Jugadores Admin',
        ];
        
        $jugadores = $jugadorModel->findAll();
        $jugadores = array('jugadores' => $jugadores);
        $viewData = array_merge($titulo, $jugadores);
        return view('admin/admin_jugador_dt', $viewData);
    }
    public function guardaUsuario()
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
            'password_hash' => $password,
            'rol' => $request->getPostGet('rol')
        );
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        if ($usuarioModel->save($data) === false) {
            var_dump($usuarioModel->errors());
        }
        $usuarios = $usuarioModel->findAll();
        $usuarios = array('usuarios' => $usuarios);

        foreach ($usuarios['usuarios'] as &$usuario) {
            $encryptedPassword = $usuario['password_hash'];
            $usuario['clavebuena'] = $encrypter->decrypt(hex2bin($encryptedPassword));
        }

        $titulo = [
            'title' => 'Ver Usuarios Admin',
        ];
    
        $data = ['usuarios' => $usuarios['usuarios']];
        $viewData = array_merge($titulo, $data);

        return view('admin/admin_usuarios_dt', $viewData);
    }
    public function guardaEquipo()
    {

        $equipoModel = new EquipoModel();
        $request = \Config\Services::request();
        $data = array(
            'nombre' => $request->getPostGet('nombre'),
            'genero' => $request->getPostGet('genero'),
            'division_id_fk' => $request->getPostGet('division_id_fk'),

        );
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        if ($equipoModel->save($data) === false) {
            var_dump($equipoModel->errors());
        }
        $titulo = [
            'title' => 'Ver Equipos Admin',
        ];
        
        $equipos = $equipoModel->findAll();
        $equipos = array('equipos' => $equipos);
        $viewData = array_merge($titulo, $equipos);
        return view('admin/admin_equipo_dt', $viewData);
    }
    public function guardaEquipoTecnico()
    {
        $equipotecnicoModel = new EquipoTecnicoModel();
        $request = \Config\Services::request();
        $data = array(
            'cargo' => $request->getPostGet('cargo'),
            'equipo_proviene_fk' => $request->getPostGet('equipo_proviene_fk'),
            'sueldo' => $request->getPostGet('sueldo'),
            'valor_hora_extra' => $request->getPostGet('valor_hora_extra'),
            'horas_extras_mes' => $request->getPostGet('horas_extras_mes')

        );
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        if ($equipotecnicoModel->save($data) === false) {
            var_dump($equipotecnicoModel->errors());
        }
        $equipots = $equipotecnicoModel->findAll();
        $equipots = array('equipots' => $equipots);
        $viewData = [
            'equipots' => $equipots,
            'title' => 'Ver Equipo Tecnico Admin'
        ];
        return view('admin/admin_equipotecnico_dt', $viewData);
    }
    public function guardaSocio()
    {

        $socioModel = new SocioModel();
        $request = \Config\Services::request();
        $data = array(
            'fecha_pago' => $request->getPostGet('fecha_pago'),

        );
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        if ($socioModel->save($data) === false) {
            var_dump($socioModel->errors());
        }
        $socios = $socioModel->findAll();
        $socios = array('socios' => $socios);
        $viewData = [
            'socios' => $socios,
            'title' => 'Ver Socio Admin'
        ];
        return view('admin/admin_socio_dt', $viewData);
    }

    public function borrarJugador()
    {
        $jugadorModel = new JugadorModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $jugadorModel->delete($id);

        $titulo = [
            'title' => 'Ver Jugadores Admin',
        ];
        
        $jugadores = $jugadorModel->findAll();
        $jugadores = array('jugadores' => $jugadores);
        $viewData = array_merge($titulo, $jugadores);
        return view('admin/admin_jugador_dt', $viewData);

        // $jugadores = $jugadorModel->findAll();
        // $jugadores = array('jugadores' => $jugadores);
        // return view('admin/admin_jugador_dt', $jugadores);
    }
    public function borrarUsuario()
    {
        $usuarioModel = new UsuarioModel();
        $request = \Config\Services::request();
        $encrypter = \config\Services::encrypter();
        $id = $request->getPostGet('id');
        $usuarioModel->delete($id);

        $usuarios = $usuarioModel->findAll();
        $usuarios = array('usuarios' => $usuarios);

        foreach ($usuarios['usuarios'] as &$usuario) {
            $encryptedPassword = $usuario['password_hash'];
            $usuario['clavebuena'] = $encrypter->decrypt(hex2bin($encryptedPassword));
        }

        $titulo = [
            'title' => 'Ver Usuarios Admin',
        ];
    
        $data = ['usuarios' => $usuarios['usuarios']];
        $viewData = array_merge($titulo, $data);

        return view('admin/admin_usuarios_dt', $viewData);

        // $usuarios = $usuarioModel->findAll();
        // $usuarios = array('usuarios' => $usuarios);
        // return view('admin/admin_usuarios_dt', $usuarios);
    }
    public function borrarEquipo()
    {
        $equipoModel = new EquipoModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $equipoModel->delete($id);

        $titulo = [
            'title' => 'Ver Equipos Admin',
        ];
        
        $equipos = $equipoModel->findAll();
        $equipos = array('equipos' => $equipos);
        $viewData = array_merge($titulo, $equipos);
        return view('admin/admin_equipo_dt', $viewData);

        // $equipos = $equipoModel->findAll();
        // $equipos = array('equipos' => $equipos);
        // return view('admin/admin_equipo_dt', $equipos);
    }
    public function borrarEquipoTecnico()
    {
        $equipotecnicoModel = new EquipoTecnicoModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $equipotecnicoModel->delete($id);
        
        $equipots = $equipotecnicoModel->findAll();
        $equipots = array('equipots' => $equipots);
        $viewData = [
            'equipots' => $equipots,
            'title' => 'Ver Equipo Tecnico Admin'
        ];
        return view('admin/admin_equipotecnico_dt', $viewData);
    }
    public function borrarSocio()
    {
        $socioModel = new SocioModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $socioModel->delete($id);
        $socios = $socioModel->findAll();
        $socios = array('socios' => $socios);
        $viewData = [
            'socios' => $socios,
            'title' => 'Ver Socio Admin'
        ];
        return view('admin/admin_socio_dt', $viewData);

        // $socios = $socioModel->findAll();
        // $socios = array('socios' => $socios);
        // return view('admin/admin_socio_dt', $socios);
    }
    public function verAdminUsuario()
    {
        $titulo = [
            'title' => 'Ver Usuario Admin',
        ];

        // Obtén una instancia del encrypter
        $encrypter = \Config\Services::encrypter();

        // Verifica si la contraseña encriptada está presente en la sesión
        if (session()->has('passwordUsuario')) {
            // Desencripta la contraseña almacenada en la sesión
            $encryptedPassword = session('passwordUsuario');
            $clavebuena = $encrypter->decrypt(hex2bin($encryptedPassword));
        } else {
            // La contraseña encriptada no está presente en la sesión, intenta obtenerla de la otra función
            $clave = $this->request->getPost('password_hash');
            $clavebuena = $encrypter->decrypt(hex2bin($clave));
        }

        // Combina los datos en un solo array
        $verCosas = array_merge(['clavebuena' => $clavebuena], $titulo);
        return view('admin/admin_ver_perfil', $verCosas);
    }
    public function guardaAdminUsuario()
    {
        $usuarioModel = new UsuarioModel();
        $request = \Config\Services::request();
        $encrypter = \config\Services::encrypter();

        // Obtén la contraseña en claro
        $clavebuena = $request->getPost('password_hash');
        // Encripta la contraseña
        $password = bin2hex($encrypter->encrypt($clavebuena));
        // Actualizar Clave de Session
        $session = session();
        $session->set('passwordUsuario', $password);

        
        $data = array(
            'nombres' => $request->getPostGet('nombres'),
            'apellidos' => $request->getPostGet('apellidos'),
            'email' => $request->getPostGet('email'),
            'run' => $request->getPostGet('run'),
            'direccion' => $request->getPostGet('direccion'),
            'telefono' => $request->getPostGet('telefono'),
            'password_hash' => $password // Utiliza la contraseña encriptada
        );
        
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        
        if ($usuarioModel->save($data) === false) {
            var_dump($usuarioModel->errors());
        }
        
        // Agregando Titulo a Cada View
        $titulo = [
            'title' => 'Editar Usuario Admin',
            'clavebuena' => $clavebuena // Agrega el valor de $clavebuena al arreglo $titulo
        ];
        
        return view('admin/admin_ver_perfil', $titulo);
    }
    public function partidoHome()
    {
        //$db = db_connect();
        $data1 = [
            'title' => 'Partidos Home Admin'
        ];

        //Agrega Ultimos Partidos
        $partidosModel = new PartidosModel();
        $partidos = $partidosModel->findAll();

        // Pasar los datos a la vista
        $data['partidos'] = $partidos;


        $verPartidos = array_merge($data, $data1);
        
        return view('admin/admin_partido_home', $verPartidos);
    }

    public function campeonatoHome()
    {
        //$db = db_connect();
        $data1 = [
            'title' => 'Campeonato Home Admin'
        ];
    
        $resultado = new ResultadosModel();
        $db = \Config\Database::connect();
    
        // Obtener partido que no esté ya en la tabla de resultados (solo aplica para los equipos los alces)
        $queryPartidosLibres = "SELECT p.id, e_local.nombre AS equipo_local, e_visita.nombre AS equipo_visita, c.id AS categoriaid, c.nombre AS nombrecategoria
            FROM partidos p
            LEFT JOIN resultados r ON p.id = r.id_partido_fk
            LEFT JOIN equipos e_local ON p.equipo_local_fk = e_local.id
            LEFT JOIN equipos e_visita ON p.equipo_visita_fk = e_visita.id
            LEFT JOIN campeonatos c ON c.id = p.campeonato_id_fk
            WHERE r.id_partido_fk IS NULL
            AND (p.equipo_local_fk = 10 OR p.equipo_local_fk = 14)
            ORDER BY p.id ASC";
            
        $partidosLibres = $db->query($queryPartidosLibres)->getResultArray();
    
        $data['partidosLibres'] = $partidosLibres;
    
    
        //AQUI
        if ($this->request->getMethod() === 'post') {
            $postData = $this->request->getPost();

            // Equipos local y visita
            //$equipoLocalId = $postData['equipo_local'];
            //$equipoVisitaId = $postData['equipo_visita'];

            if (empty($postData['equipo_destino']) || empty($postData['equipo_local']) || empty($postData['equipo_visita']) || empty($postData['tipopartido'])) {
                return redirect()->back()->withInput()->with('error', 'Falta seleccionar una opción en el formulario');
            }
            
            if (empty($postData['goleslocal']) || empty($postData['golesvisita'])) {
                return redirect()->back()->withInput()->with('error', 'Falta ingresar los goles');
            }
            
            if ($postData['equipo_local'] === $postData['equipo_visita']) {
                return redirect()->back()->withInput()->with('error', 'Los equipos no pueden ser los mismos');
            }

            $equiposLocalIdd = "SELECT id, nombre, genero FROM equipos WHERE id = '{$postData['equipo_local']}'";
            $equipoLocal = $db->query($equiposLocalIdd)->getFirstRow();
            $equipoLocalId = $equipoLocal->id;

            $equiposVisitaIdd = "SELECT id, nombre, genero FROM equipos WHERE id = '{$postData['equipo_visita']}'";
            $equipoVisita = $db->query($equiposVisitaIdd)->getFirstRow();
            $equipoVisitaId = $equipoVisita->id;

            // Datos para la tabla resultados
            $resultadoData = [
                'equipo_local_fk' => $equipoLocalId,
                'equipo_visita_fk' => $equipoVisitaId,
                'goles_local' => $postData['goleslocal'],
                'goles_visita' => $postData['golesvisita'],
                'id_partido_fk' => ($postData['equipo_destino'] === 'no_aplica') ? null : $postData['equipo_destino'],
                'campeonato_id_fk' => $postData['tipopartido']
            ];

            // Guardar el resultado en la base de datos
            $resultado->save($resultadoData);

            return redirect()->to('/AdminDashBoard/campeonatoHome')->with('success', 'Resultado agregado exitosamente');
        }
    
        $cc = array_merge($data, $data1);
    
        return view('admin/admin_campeonato_home', $cc);
    }

    public function obtenerEquiposLocalVisita($idd)
    {
        if ($idd === "no_aplica") {
            $db = \Config\Database::connect();
            $query = "SELECT id, nombre FROM equipos";
            $query2 = "SELECT r.campeonato_id_fk AS id, c.nombre 
                        FROM resultados r 
                        JOIN campeonatos c ON r.campeonato_id_fk = c.id 
                        GROUP BY r.campeonato_id_fk;";
            $equipos = $db->query($query)->getResultArray();
            $categorias = $db->query($query2)->getResultArray();
            $equipos2 = [
                'equipos' => $equipos,
                'categorias' => $categorias
            ];
            echo json_encode($equipos2);
        } else {
            // Realiza la consulta original para obtener los equipos del partido seleccionado
            $db = \Config\Database::connect();
            $query = "SELECT p.id, e_local.id as id_local ,e_local.nombre AS equipo_local, e_visita.id as id_visita,e_visita.nombre AS equipo_visita, c.id AS categoriaid, c.nombre AS nombrecategoria
                        FROM partidos p
                        LEFT JOIN resultados r ON p.id = r.id_partido_fk
                        LEFT JOIN equipos e_local ON p.equipo_local_fk = e_local.id
                        LEFT JOIN equipos e_visita ON p.equipo_visita_fk = e_visita.id
                        LEFT JOIN campeonatos c ON c.id = p.campeonato_id_fk
                        WHERE r.id_partido_fk IS NULL
                        AND (p.equipo_local_fk = 10 OR p.equipo_local_fk = 14)
                        AND p.id = ?
                        ORDER BY p.id ASC";
            $equipos = $db->query($query, [$idd])->getResultArray();
            echo json_encode($equipos);
        }
    }
}
