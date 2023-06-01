<?php namespace App\Controllers;
use App\Models\JugadorModel;
use App\Models\EquipoModel;
use App\Models\UsuarioModel;

class AdminDashboard extends BaseController
{
    public function Dashboard()
    {
        return view('admin/admin_dashboard');
    }

    public function jugadorDataBase()
    {
        $jugadorModel = new JugadorModel();
        $jugadores=$jugadorModel->findAll();
        $jugadores=array('jugadores'=>$jugadores);
        return view('admin/admin_jugador_dt', $jugadores);
    }

    public function equipoDatabase()
    {
        $equipoModel = new EquipoModel();
        $equipos=$equipoModel->findAll();
        $equipos=array('equipos'=>$equipos);
        return view('admin/admin_equipo_dt', $equipos);
    }

    public function usuarioDatabase()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios=$usuarioModel->findAll();
        $usuarios=array('usuarios'=>$usuarios);
        return view('admin/admin_usuarios_dt', $usuarios);
    }


    public function __construct(){
		helper('form');
	}

    public function edit_action(){

    }
    public function guarda(){

        
        $jugadorModel = new JugadorModel();
		$request= \Config\Services::request();
        
        if (!empty($_POST['guarda'])) {
            $posicion = $_POST['posicion'];
            $goles = $_POST['goles'];
            $partidos_jugados = $_POST['partidos_jugados'];
            $equipo_proviene = $_POST['equipo_proviene'];
            $tipo = $_POST['tipo'];
            $sueldo = $_POST['sueldo'];
            $ayuda_economica = $_POST['ayuda_economica'];
            $lesionado = $_POST['lesionado'];
          
            // Check if any required fields are empty
            if (empty($posicion) || empty($goles) || empty($partidos_jugados) || empty($equipo_proviene) || empty($tipo) || empty($sueldo) || empty($ayuda_economica) || empty($lesionado)) {
                echo "Please fill in all the required fields.";
            } else {
                $data=array(
                    //'nombres' => $request->getPostGet('nombres'),
                    //'apellidos' => $request->getPostGet('apellidos'),
                    //'run' => $request->getPostGet('run'),
                    //'fecha_nacimiento' => $request->getPostGet('fecha_nacimiento'),
                    //'foto_url' => $request->getPostGet('foto_url'),
                    'posicion' => $request->getPostGet('posicion'),
                    'goles' => $request->getPostGet('goles'),
                    'partidos_jugados' => $request->getPostGet('partidos_jugados'),
                    'equipo_proviene' => $request->getPostGet('equipo_proviene'),
                    'tipo' => $request->getPostGet('tipo'),
                    'sueldo' => $request->getPostGet('sueldo'),
                    'ayuda_economica' => $request->getPostGet('ayuda_economica'),
                    'lesionado' => $request->getPostGet('lesionado'),
                    //'equipo_id' => $request->getPostGet('equipo_id'),
                    //'button_field' => $request->getPostGet('button_field')
                
                );
                if($request->getPostGet('id')){
                    $data['id']=$request->getPostGet('id');
                }
                if($jugadorModel->save($data)===false){
                    var_dump($jugadorModel->errors());
                }
                $jugadores=$jugadorModel->findAll();
                $jugadores=array('jugadores'=>$jugadores);
                return view('admin/admin_jugador_dt', $jugadores);
            }
        }
		
	}
    public function guardaUsuario(){

        $usuarioModel = new UsuarioModel();
		$request= \Config\Services::request();
		$data=array(
            'nombres' => $request->getPostGet('nombres'),
            'apellidos' => $request->getPostGet('apellidos'),
            'email' => $request->getPostGet('email'),
            'run' => $request->getPostGet('run'),
            'direccion' => $request->getPostGet('direccion'),
            'telefono' => $request->getPostGet('telefono'),
            'password_hash' => $request->getPostGet('password_hash'),
            'rol' => $request->getPostGet('rol')
		);
        if($request->getPostGet('id')){
			$data['id']=$request->getPostGet('id');
		}
		if($usuarioModel->save($data)===false){
			var_dump($usuarioModel->errors());
		}
        $usuarios=$usuarioModel->findAll();
        $usuarios=array('usuarios'=>$usuarios);
        return view('admin/admin_usuarios_dt', $usuarios);
	}


    public function borrarJugador(){
		$jugadorModel=new JugadorModel();
		$request= \Config\Services::request();
		$id=$request->getPostGet('id');
		$jugadorModel->delete($id);
		$jugadores=$jugadorModel->findAll();
		$jugadores=array('jugadores'=>$jugadores);
        return view('admin/admin_jugador_dt', $jugadores);
	}
    public function borrarUsuario(){
		$usuarioModel=new UsuarioModel();
		$request= \Config\Services::request();
		$id=$request->getPostGet('id');
		$usuarioModel->delete($id);
		$usuario=$usuarioModel->findAll();
		$usuarios=array('usuarios'=>$usuarios);
        return view('admin/admin_jugador_dt', $usuarios);
	}

}