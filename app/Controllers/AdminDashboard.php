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
}