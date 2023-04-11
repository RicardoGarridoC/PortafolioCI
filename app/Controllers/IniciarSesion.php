<?php

namespace App\Controllers;

class IniciarSesion extends BaseController
{
    public function index()
    {
        return view('header').view('iniciar_sesion').view('footer');
    }
}