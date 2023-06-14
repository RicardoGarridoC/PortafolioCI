<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SesionSocio implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // dd($arguments);
        if (!session()) {
            return redirect()->route('/');
        }

        $model =  model('UsuarioModel');


        $row = $model->select('rol')->where('email', session()->emailUsuario)->get()->getRow();


        if ($row !== null && property_exists($row, 'rol')) {
            $user = $row->rol;
        } else {
            session()->destroy();
            return redirect()->route('/');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
