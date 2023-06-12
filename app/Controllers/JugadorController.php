<?php

namespace App\Controllers;
use App\Models\CustomModel;

class JugadorController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function Dashboard()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Inicio Jugador',
        ];

        return view('jugador/inicio_jugador', $titulo);
    }
    public function jugadorverCampeonatos()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Campeonatos Jugador',
        ];

        return view('jugador/jugador_ver_campeonatos', $titulo);
    }
    public function jugadorverEstadisticas()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Estadisticas Jugador',
        ];

        return view('jugador/jugador_ver_estadisticas', $titulo);
    }
    public function jugadorverJugadores()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Jugadores Jugador',
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

        return view('jugador/jugador_ver_jugadores', $verData);
    }
    public function jugadorverPartidos()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Partidos Jugador',
        ];

        return view('jugador/jugador_ver_partidos', $titulo);
    }

}
