<?php

namespace App\Controllers;

use App\Models\usermodel;


class Registrarse extends BaseController
{
    public function index()
    {



        return view('registrarse');
    }

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
                $userModel = new usermodel();
                $userData = [
                    'nombres' => $firstName,
                    'apellidos' => $lastName,
                    'email' => $email,
                    'run' => $run,
                    'direccion' => $address,
                    'telefono' => $phone,
                    'password_hash' => $password
                ];
                $userModel->insert($userData);

                // Redirigir al usuario a una página de éxito o mostrar un mensaje
                // de éxito en la misma página.
                return redirect()->to('/login');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        // Cargar la vista del formulario de registro
        return view('registrarse', $data);
    }
}
