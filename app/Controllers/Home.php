<?php

namespace App\Controllers;
use App\Models\SocioModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $socioModel = new SocioModel();
        $socio=$socioModel->find('4');
        // var_dump($socio);
        return view('header').view('home', $socio).view('footer');
    }
}
