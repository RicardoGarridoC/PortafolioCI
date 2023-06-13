<?php

namespace App\Filters;

use App\Models\UsuarioModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use function PHPUnit\Framework\isNull;

class SesionAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // dd($arguments);
        if (!session()) {
            return redirect()->route('/');
        }

        $model =  model('UsuarioModel');


        if (!$user = $model->select('rol')->where('id', session()->idUsuario)->get()->getRow()->rol) {

            session()->destroy();
            return redirect()->route('/Home');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
