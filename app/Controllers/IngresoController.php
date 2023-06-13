<?php namespace App\Controllers;

use App\Models\IngresoModel;
use App\Models\SponsorModel;
use CodeIgniter\Controller;

class IngresoController extends BaseController
{
    public function registrar()
    {
        $ingreso = new IngresoModel();
        $sponsor = new SponsorModel();

        $validation = \Config\Services::validation();
        $validation->setRules($ingreso->validationRules);

        $sponsors = $sponsor->findAll();
        $sponsorNames = array_column($sponsors, 'nombre', 'id');
        $sponsorAmounts = array_column($sponsors, 'monto_por_partido', 'id');

        $data = [
            'title' => 'Ingresos',
            'sponsorNames' => $sponsorNames,
            'sponsorAmounts' => $sponsorAmounts,
        ];

        if ($this->request->getMethod() === 'post') {
                $postData = $this->request->getPost();
                $postData['monto'] = $postData['concepto'] === 'sponsor' ? $sponsorAmounts[$postData['sponsor_id']] : $postData['monto'];
                $postData['detalle'] = $postData['concepto'] === 'sponsor' ? $sponsorNames[$postData['sponsor_id']] : $postData['detalle'];

                $ingreso->save($postData);
                
                // Redirigir a la página deseada después de guardar el ingreso
                return redirect()->to('IngresoController/registrar')->with('success', 'Ingreso registrado exitosamente');
        }

        return view('agregar_ingreso', $data);
    }
    public function __construct()
    {
        helper('form');
    }
}












