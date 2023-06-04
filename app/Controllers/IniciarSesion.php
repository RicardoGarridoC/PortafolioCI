<?php

namespace App\Controllers;

use App\Models\Usermodel;
use CodeIgniter\Database\Query;

class IniciarSesion extends BaseController
{
    protected $usuario;

    public function index()
    {



        return view('IniciarSesion');
    }


    public function validarIngreso()
    {

        $email1 = $this->request->getPost("email");
        if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email1, FILTER_SANITIZE_EMAIL);
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

                //Buscar rol del usuario

                // $database = \Config\Database::connect();
                // $query = ($database->table('usuarios')->select('rol')->where('email', $email1));
                // $this->$database->select('rol')->from('usuarios')->where('email', $email1);
                // $query = $this->$database->get();
                //Control de vistas por Rol
                // if ($query) {
                //     switch ($query) {
                //         case  1:
                //             //redirecciona a vista de administrador
                //             return redirect()->to(base_url() . '/ ');

                //         case 'direccion':
                //             //redirecciona a vista de direccion 
                //             return redirect()->to(base_url() . '/ ');

                //         case 'jugador':
                //             //redirecciona a vista de jugador
                //             return redirect()->to(base_url() . '/ ');

                //         case 'entrenador':
                //             //redirecciona a vista de entrenador
                //             return redirect()->to(base_url() . '/ ');

                //         case 'equipo_tecnico':
                //             //redirecciona a vista de equipo_tecnico
                //             return redirect()->to(base_url() . '/ ');

                //         case 'socio':
                //             //redirecciona a vista de socio
                //             return redirect()->to(base_url() . '/ ');
                //     }
                // }

                return redirect()->to(base_url() . '/ ');
            } else {
                $data = ['tipo' => 'danger', 'mensaje' => 'clave y/o usuario invalido '];
                return view(('IniciarSesion'),  $data);
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
