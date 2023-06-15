<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SesionJugador implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('emailUsuario')) {
            return redirect()->to('/');
        }

        $model = model('UsuarioModel');
        $user = $model->select('rol')->where('email', session()->get('emailUsuario'))->get()->getRow();

        if (property_exists($user, 'rol') && $user->rol === 'jugador') {
            // El usuario tiene el rol de "jugador", permitir el acceso
            return;
        } else {
            // El usuario no tiene el rol de "jugador", redirigir al inicio
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
