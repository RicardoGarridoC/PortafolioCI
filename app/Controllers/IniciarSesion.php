<?php

namespace App\Controllers;

use App\Models\Usermodel;

class IniciarSesion extends BaseController
{
    protected $usuario;

    public function index()
    {



        return view('IniciarSesion');
    }

    public function validarIngreso()
    {

        $email = $this->request->getPost("email");
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $this->usuario = new Usermodel();
            $resultadoUsuario = $this->usuario->buscarUsuarioPorEmail($email);
        } else {
            $data = ['tipo' => 'danger', 'mensaje' => 'Usuario  y/o clave invalido'];
            return view(('login'), $data);
        }

        if ($resultadoUsuario) {
            $encrypter = \config\Services::encrypter();
            $claveBD = $encrypter->decrypt(hex2bin($resultadoUsuario->password_hash));


            $clave = $this->request->getPost("password");
            if ($clave == $claveBD) {
                $data = [
                    "nombreUsuario" => $resultadoUsuario->nombres . ' ' . $resultadoUsuario->apellidos,
                    "emailUsuario" => $resultadoUsuario->email
                ];
                session()->set($data);
                return redirect()->to(base_url() . '/ ');
            } else {
                $data = ['tipo' => 'danger', 'mensaje' => 'clave y/o usuario invalido '];
                return view(('IniciarSesion'), $data);
            }
        } else {
            // print_r($_POST);
            $data = ['tipo' => 'danger', 'mensaje' => 'Usuario  y/o clave invalido'];
            return view(('IniciarSesion'), $data);
        }
    }

    public function cerrarSesion()
    {
        session()->destroy();
        return redirect()->to(base_url() . '/login');
    }
}
