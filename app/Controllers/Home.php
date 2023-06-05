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
        echo view('templates/header');
        echo view('home', $usuario);
        echo view('templates/footer');
    }

    public function homesocios()
    {
        return view('templates/header').view('home_socios').view('templates/footer');
    }

    public function homeiniciosesion()
    {
        return view('iniciar_sesion');
    }

    public function homeregistro()
    {
        return view('templates/header').view('registrarse').view('templates/footer');
    }
}
?>