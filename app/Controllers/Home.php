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
        echo view('home/home', $usuario);
        echo view('templates/footer');
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
        return view('home/registrarse');
    }

    //INICIAR SESION
    public function validarIngreso()
    {
        $email1 = $this->request->getPost("email");
        if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email1, FILTER_SANITIZE_EMAIL);
            $this->usuario = new UsuarioModel();
            $resultadoUsuario = $this->usuario->buscarUsuarioPorEmail($email);
        } else {
            $data = ['tipo' => 'danger', 'mensaje' => 'Usuario  y/o clave invalido'];
            return view(('home/iniciar_sesion'), $data);
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

                return redirect()->to(base_url() . 'InicioSocios');
            } else {
                $data = ['tipo' => 'danger', 'mensaje' => 'clave y/o usuario invalido '];
                return view(('home/iniciar_sesion'),  $data);
            }
        } else {
            // print_r($_POST);
            $data = ['tipo' => 'danger', 'mensaje' => 'Usuario  y/o clave invalido'];
            return view(('home/iniciar_sesion'), $data);
        }
    }
    
    //Cerrar Sesion (General)
    public function cerrarSesion()
    {
        session()->destroy();
        return redirect()->to(base_url() . 'Home');
    }

    //REGISTRARSE
    public function register()
    {
        $data = [];

        if ($this->request->getMethod() === 'post') {


            // Validar los datos del formulario
            $rules = [
                'nombres' => 'required',
                'apellidos' => 'required',
                'email' => 'required|valid_email',
                'run' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'password_hash' => 'required'
            ];
            try {
                if ($this->validate($rules)) {
                    $encrypter = \config\Services::encrypter();
                    // Obtener los datos del formulario
                    $firstName = $this->request->getPost('nombres');
                    $lastName = $this->request->getPost('apellidos');
                    $email = $this->request->getPost('email');
                    $run = $this->request->getPost('run');
                    $address = $this->request->getPost('direccion');
                    $phone = $this->request->getPost('telefono');
                    $clave = $this->request->getPost('password_hash');
                    $password = bin2hex($encrypter->encrypt($clave));
                    // Guardar los datos en la base de datos
                    $userModel = new UsuarioModel();
                    $userData = [
                        'nombres' => $firstName,
                        'apellidos' => $lastName,
                        'email' => $email,
                        'run' => $run,
                        'direccion' => $address,
                        'telefono' => $phone,
                        'password_hash' => $password,
                        'rol' => 'socio'
                    ];
                    $database = \Config\Database::connect();
                    $queryEmail = $database->table('usuarios')->where('email', $email)->get();



                    if ($queryEmail->getNumRows() > 0) {
                        $data = ['tipo' => 'danger', 'mensaje' => 'El correo electrónico está duplicado '];
                        return view(('home/registrarse'), $data);
                    } else {
                        try {
                            $userModel->insert($userData);
                            return redirect()->to('IniciarSesion');
                        } catch (\Exception $e) {
                            $data = ['tipo' => 'danger', 'mensaje' => 'Error al registrar usuario '];
                            return view(('home/registrarse'), $data);
                        }
                    }


                    // Redirigir al usuario a una página de éxito o mostrar un mensaje
                    // de éxito en la misma página.

                } else {
                    $data = ['tipo' => 'danger', 'mensaje' => 'Datos invalidos '];
                    return view(('home/registrarse'), $data);
                }
            } catch (\Exception $data) {
                $data = ['tipo' => 'danger', 'mensaje' => 'Error al registrar usuario '];
                return view(('home/registrarse'), $data);
            }
            // Cargar la vista del formulario de registro

        }
        return view('home/registrarse', $data);
    }
}