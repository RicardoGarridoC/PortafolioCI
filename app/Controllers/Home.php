<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $usuario=$usuarioModel->find('1');
        // var_dump($socio);
        return view('header').view('home', $usuario).view('footer');
    }
}
