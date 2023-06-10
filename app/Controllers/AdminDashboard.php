<?php

namespace App\Controllers;

use App\Models\JugadorModel;
use App\Models\EquipoModel;
use App\Models\UsuarioModel;
use App\Models\EquipoTecnicoModel;
use App\Models\SocioModel;
use App\Models\CustomModel;

class AdminDashboard extends BaseController
{
    public function Dashboard()
    {
        return view('admin/admin_dashboard');
    }

    public function equipoDatabase()
    {
        $equipoModel = new EquipoModel();
        $equipos = $equipoModel->findAll();
        $equipos = array('equipos' => $equipos);
        return view('admin/admin_equipo_dt', $equipos);
    }

    public function usuarioDatabase()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->findAll();
        $usuarios = array('usuarios' => $usuarios);
        return view('admin/admin_usuarios_dt', $usuarios);
    }

    public function jugadorDataBase()
    {

        $jugadorModel = new JugadorModel();
        $jugadores = $jugadorModel->findAll();
        $jugadores = array('jugadores' => $jugadores);
        return view('admin/admin_jugador_dt', $jugadores);
    }

    public function equipotecnicoDatabase()
    {
        $db = db_connect();
        $equipotecnicoModel = new CustomModel($db);
        $equipots = $equipotecnicoModel->getEquipoTecnico();
        return view('admin/admin_equipotecnico_dt', ['equipots' => $equipots]);

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
        return view('admin/admin_socio_dt', ['socios' => $socios]);

        //$socioModel = new SocioModel();
        //$socios=$socioModel->findAll();
        //$socios=array('socios'=>$socios);
        //return view('admin/admin_socio_dt', $socios);
    }

    public function __construct()
    {
        helper('form');
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
            'lesionado' => $request->getPostGet('lesionado'),
            'equipo_proviene_id_fk' => $request->getPostGet('equipo_proviene_id_fk')

        );
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        if ($jugadorModel->save($data) === false) {
            var_dump($jugadorModel->errors());
        }
        $jugadores = $jugadorModel->findAll();
        $jugadores = array('jugadores' => $jugadores);
        return view('admin/admin_jugador_dt', $jugadores);
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
        return view('admin/admin_usuarios_dt', $usuarios);
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
        $equipos = $equipoModel->findAll();
        $equipos = array('equipos' => $equipos);
        return view('admin/admin_equipo_dt', $equipos);
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
        return view('admin/admin_equipotecnico_dt', $equipots);
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
        return view('admin/admin_socio_dt', $socios);
    }

    public function borrarJugador()
    {
        $jugadorModel = new JugadorModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $jugadorModel->delete($id);
        $jugadores = $jugadorModel->findAll();
        $jugadores = array('jugadores' => $jugadores);
        return view('admin/admin_jugador_dt', $jugadores);
    }
    public function borrarUsuario()
    {
        $usuarioModel = new UsuarioModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $usuarioModel->delete($id);
        $usuarios = $usuarioModel->findAll();
        $usuarios = array('usuarios' => $usuarios);
        return view('admin/admin_usuarios_dt', $usuarios);
    }
    public function borrarEquipo()
    {
        $equipoModel = new EquipoModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $equipoModel->delete($id);
        $equipos = $equipoModel->findAll();
        $equipos = array('equipos' => $equipos);
        return view('admin/admin_equipo_dt', $equipos);
    }
    public function borrarEquipoTecnico()
    {
        $equipotecnicoModel = new EquipoTecnicoModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $equipotecnicoModel->delete($id);
        $equipots = $equipotecnicoModel->findAll();
        $equipots = array('equipots' => $equipots);
        return view('admin/admin_equipotecnico_dt', $equipots);
    }
    public function borrarSocio()
    {
        $socioModel = new SocioModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $socioModel->delete($id);
        $socios = $socioModel->findAll();
        $socios = array('socios' => $socios);
        return view('admin/admin_socio_dt', $socios);
    }
}
