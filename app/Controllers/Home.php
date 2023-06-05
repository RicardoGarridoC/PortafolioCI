<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find('1');
        
        echo view('templates/header');
        echo view('templates/footer');
        echo view('home/home', $usuario);
    }


    public function homesocios()
    {
        return view('templates/header').view('home/home_socios').view('templates/footer');
    }

    public function homeiniciosesion()
    {
        return view('home/iniciar_sesion');
    }

    public function homeregistro()
    {
        return view('templates/header').view('home/registrarse').view('templates/footer');
    }
}
?>