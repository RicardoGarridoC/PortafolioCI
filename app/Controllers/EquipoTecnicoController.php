<?php

namespace App\Controllers;


class EquipoTecnicoController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function Dashboard()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Inicio Equipo Técnico',
        ];

        return view('equipotecnico/inicio_equipotecnico', $titulo);
    }
    public function equipotecnicoverCampeonatos()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Campeonatos Equipo Técnico',
        ];

        return view('equipotecnico/equipotecnico_ver_campeonatos', $titulo);
    }
    public function equipotecnicoverEstadisticas()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Estadisticas Equipo Técnico',
        ];

        return view('equipotecnico/equipotecnico_ver_estadisticas', $titulo);
    }
    public function equipotecnicoverJugadores()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Jugadores Equipo Técnico',
        ];

        return view('equipotecnico/equipotecnico_ver_jugadores', $titulo);
    }
    public function equipotecnicoverPartidos()
    {
        // Agregando Titulo a Cada View
        $titulo = [ 
            'title' => 'Partidos Equipo Tecnico',
        ];

        return view('equipotecnico/equipotecnico_ver_partidos', $titulo);
    }

}
    
