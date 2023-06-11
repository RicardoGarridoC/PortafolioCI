<?php namespace App\Controllers;

use App\Models\JugadorModel;
use App\Models\PartidosModel;
use CodeIgniter\Controller;



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


    public function verReportes()
    {
        //Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Reportes',
        ];

        return view('templates/reportes', $titulo);
    }


}