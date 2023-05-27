<?php

namespace App\Controllers;
use App\Models\SocioModel;
use CodeIgniter\Controller;

class DashboardSocio extends BaseController
{
    public function index()
    {
        return view('header').view('dashboard_socio').view('footer');
    }
}