<?php

namespace App\Controllers;


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

        return view('jugador/jugador_ver_jugadores', $titulo);
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
