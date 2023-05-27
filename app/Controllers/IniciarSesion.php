<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class IniciarSesion extends BaseController
{
    public function index()
    {
        // Carga las vistas header, iniciar_sesion y footer
        return view('header') . view('iniciar_sesion') . view('footer');
    }

    public function validar_usuario()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('email', $email)->first();

        if ($usuario) {
            if ($usuario['password_hash'] == $password) {
                if ($usuario['rol'] == 'socio') {
                    // Redireccionar al dashboard del socio
                    // Almacenar los datos del usuario en la sesión
                    session()->set('isLoggedIn', true);
                    session()->set('userData', $usuario);

                    return view('header') . view('dashboard_socio', ['usuario' => $usuario]). view('footer');
                } else if ($usuario['rol'] == 'administrador') {
                    // Redireccionar al home del administrador
                    return view('header') . view('home') . view('footer');
                }
            }
        }

        // Usuario o contraseña incorrectos, mostrar mensaje de error
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        return view('header') . view('iniciar_sesion') . view('footer');
    }

}
