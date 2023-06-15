<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SesionSocio implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('emailUsuario')) {
            return redirect()->to('/');
        }

        $model = model('UsuarioModel');
        $user = $model->select('rol')->where('email', session()->get('emailUsuario'))->get()->getRow();

        if ($user !== null && property_exists($user, 'rol') && $user->rol === 'socio') {
            // El usuario tiene el rol de "socio", permitir el acceso
            return;
        } else {
            // El usuario no tiene el rol de "socio", redirigir al inicio
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No es necesario hacer nada después del procesamiento de la solicitud
    }
}
