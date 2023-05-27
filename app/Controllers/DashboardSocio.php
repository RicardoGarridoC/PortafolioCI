<?php

namespace App\Controllers;
use App\Models\SocioModel;
use CodeIgniter\Controller;

class DashboardSocio extends BaseController
{
    public function index()
    {
        // Verificar si el usuario ha iniciado sesión
        if (!session()->get('isLoggedIn')) {
            // Si no ha iniciado sesión, redireccionar al inicio de sesión
            return redirect()->to('iniciar_sesion');
        }
    
        // Obtener los datos del usuario de la sesión
        $userData = session()->get('userData');
    
        // Pasar los datos del usuario a la vista
        $data['usuario'] = $userData;
    
        // Cargar la vista con los datos del usuario
        return view('header') . view('dashboard_socio', $data) . view('footer');
    }
    

}