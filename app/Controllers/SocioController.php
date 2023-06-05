<?php namespace App\Controllers;

use App\Models\JugadorModel;
use CodeIgniter\Controller;

class SocioController extends BaseController
{
    public function inicioSocios()
    {
        return view('socio/inicio_socios');
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
        return view('socio/ver_campeonatos');
    }
}