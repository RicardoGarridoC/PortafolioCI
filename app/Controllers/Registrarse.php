<?php

namespace App\Controllers;

use App\Models\UsuarioRegisterModel;

class Registrarse extends BaseController
{
    public function index()
    {
        helper('form');
        return view('header') . view('registrarse') . view('footer');
    }

    public function registrar()
    {
        $usuario = new UsuarioRegisterModel();

        $validation = \Config\Services::validation();
        $validation->setRules($usuario->validationRules);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
            $password = $this->request->getPost('password_hash');
            $passwordConfirm = $this->request->getPost('password_confirm');

            if ($password !== $passwordConfirm) {
                return redirect()->back()->withInput()->with('error', 'Las contraseñas no coinciden');
            }
            $data = $this->request->getVar();
            $data['rol'] = 'socio';
            $usuario->save($this->request->getPost());
            return view('header') . view('dashboard_socio', ['usuario' => $usuario]). view('footer');
        }
    }


    public function registroExitoso()
    {
        return view('registro_exitoso');
    }
}
