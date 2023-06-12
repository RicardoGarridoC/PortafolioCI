<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SesionDirector implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // dd($arguments);
        if (!session()) {
            return redirect()->route('/');
        }

        $model =  model('UsuarioModel');


        $user = $model->select('rol')->where('email', session()->emailUsuario)->get()->getRow()->rol;
        if ($user = !'direccion') {
            session()->destroy();
            return redirect()->route('/Home');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
