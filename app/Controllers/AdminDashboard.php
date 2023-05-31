<?php namespace App\Controllers;
use App\Models\JugadorModel;
use App\Models\EquipoModel;

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

    public function __construct(){
		helper('form');
	}

    public function edit_action(){

    }
    public function guarda(){
        
        $jugadorModel = new JugadorModel();
		$request= \Config\Services::request();
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
			var_dump($userModel->errors());
		}
        $jugadores=$jugadorModel->findAll();
        $jugadores=array('jugadores'=>$jugadores);
        return view('admin/admin_jugador_dt', $jugadores);
	}
    public function borrar(){
		$jugadorModel=new JugadorModel();
		$request= \Config\Services::request();
		$id=$request->getPostGet('id');
		$jugadorModel->delete($id);
		$jugadores=$jugadorModel->findAll();
		$jugadores=array('jugadores'=>$jugadores);
        return view('admin/admin_jugador_dt', $jugadores);
	}

}