<?php

namespace App\Controllers;

class Registrarse extends BaseController
{
    public function index()
    {
        return view('header').view('registrarse').view('footer');
    }
}