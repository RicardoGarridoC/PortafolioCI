<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SesionJugador implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // dd($arguments);
        if (!session()) {
            return redirect()->route('/');
        }

        $model =  model('UsuarioModel');


        if (!$user = $model->select('rol')->where('email', session()->emailUsuario)->get()->getRow()->rol) {
            session()->destroy();
            return redirect()->route('/Home');
        }

        if (!$user) {
            return redirect()->route('/IniciarSesion');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
