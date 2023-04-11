<?php

namespace App\Controllers;

class HomeSocios extends BaseController
{
    public function index()
    {
        return view('header').view('home_socios').view('footer');
    }
}