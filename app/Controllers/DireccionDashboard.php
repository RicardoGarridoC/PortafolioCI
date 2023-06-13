<?php

namespace App\Controllers;

use App\Models\IngresosModel;
use App\Models\JugadorModel;
use App\Models\PartidosModel;
use CodeIgniter\Controller;



class DireccionDashboard extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function direccionDashboard()
    {
        //Agregando Titulo a Cada View
        $titulo = [
            'title' => 'Inicio',
        ];

        return view('direccion/director_dashboard', $titulo);
    }

    public function ingresosEspeciales()
    {
        $titulo = [
            'title' => 'Ingresos especiales',
        ];
        $data = [];
        if ($this->request->getMethod() === 'post') {
            // Validar los datos del formulario
            $rules = [
                'monto' => 'required',

            ];
            try {
                if ($this->validate($rules)) {

                    $monto = $this->request->getPost('monto');

                    // Guardar los datos en la base de datos
                    $ingresoModel = new IngresosModel();
                    $userData = [
                        'monto' => $monto,
                        'concepto' => 'actividades_extra',
                        'fecha' => date('Y-m-d')
                    ];
                    $database = \Config\Database::connect();

                    if (!$monto) {
                        $data = ['tipo' => 'danger', 'mensaje' => ' Ingrese un monto valido '];
                        return view(('direccion/director_ingresos_especiales'), $data);
                    } else {
                        try {
                            $ingresoModel->insert($userData);
                            return redirect()->to('IngresosEspeciales')->with('success', 'Ingreso registrado exitosamente');
                        } catch (\Exception $e) {
                            $data = ['tipo' => 'danger', 'mensaje' => 'Error al registrar monto '];
                            return view(('direccion/director_ingresos_especiales'), $data);
                        }
                    }


                    // Redirigir al usuario a una página de éxito o mostrar un mensaje
                    // de éxito en la misma página.

                } else {
                    $data = ['tipo' => 'danger', 'mensaje' => 'Dato Invalido '];
                    return view(('direccion/director_ingresos_especiales'), $data);
                }
            } catch (\Exception $data) {
                $data = ['tipo' => 'danger', 'mensaje' => 'Error al registrar monto '];
                return view(('direccion/director_ingresos_especiales'), $data);
            }
            // Cargar la vista del formulario de registro

        }
        return view(('direccion/director_ingresos_especiales'), $data);
    }
}
