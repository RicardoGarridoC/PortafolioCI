<?php

namespace App\Controllers;

use App\Models\EgresoModel;
use App\Models\JugadorModel;
use App\Models\GolesModel;
use App\Models\CambiosModel;
use App\Models\TarjetasModel;
use App\Models\PartidoModel;
use App\Models\EquipoModel;
use App\Models\UsuarioModel;
use App\Models\CambiosExternoModel;

class PartidoEnVivoController extends BaseController
{
    public function index (){
        $db = \Config\Database::connect();
    
        $queryPartidos = $db->query("SELECT p.id,
        e.nombre as equipo_local,
        e.id as id_equipo_local,
        e.genero as genero_equipo_local,
        e2.nombre as equipo_visita_fk,
        p.fecha 
        FROM partidos p
        left join equipos e on
        e.id = p.equipo_local_fk 
        left join equipos e2 on
        e2.id = p.equipo_visita_fk 
        WHERE DATE(p.fecha) = CURDATE()");
    
        $partidos = $queryPartidos->getResult();
        
        $data = [ 
            'title' => 'Partido en vivo',
            'partidos' => $partidos,
        ];
    
        return view('admin/partido_en_vivo', $data);
    }
    
    public function obtenerJugadores($genero_equipo_local) {
        $db = \Config\Database::connect();
    
        $queryJugadores = $db->query("select j.id,
        concat(u.nombres, ' ', u.apellidos) as nombre_jugador,
        j.numero_camiseta
        from jugadores j
        left join usuarios u on
        j.id = u.jugador_id_fk
        where genero = '{$genero_equipo_local}'");
    
        $jugadores = $queryJugadores->getResult();
    
        return $this->response->setJSON($jugadores);
    }
    
    public function agregarGol()
    {
        if ($this->request->getMethod() === 'post') {
            $postData = $this->request->getJSON();

            $golData = [
                'partido_id_fk' => $postData->partido_id_fk,
                'minuto' => $postData->minuto,
            ];

            if (isset($postData->jugador_id_fk)) {
                $golData['jugador_id_fk'] = $postData->jugador_id_fk;
            }

            if (isset($postData->jugador_visita)) {
                $golData['jugador_visita'] = $postData->jugador_visita;
            }

            $golModel = new GolesModel();
            $golModel->save($golData);
            
            return $this->response->setStatusCode(200, 'Gol agregado exitosamente');
        } else {
            return $this->response->setStatusCode(405, 'Método no permitido');
        }
    }

    public function obtenerJugadoresSin($genero_equipo_local, $jugador_id) {
        $db = \Config\Database::connect();
    
        $queryJugadores = $db->query("SELECT j.id,
        CONCAT(u.nombres, ' ', u.apellidos) AS nombre_jugador,
        j.numero_camiseta
        FROM jugadores j
        LEFT JOIN usuarios u ON
        j.id = u.jugador_id_fk
        WHERE genero = '{$genero_equipo_local}' AND j.id != '{$jugador_id}'");
    
        $jugadores = $queryJugadores->getResult();
    
        return $this->response->setJSON($jugadores);
    }
    
    public function agregarCambio()
    {
        if ($this->request->getMethod() === 'post') {
            $postData = $this->request->getJSON();

            $cambioData = [
                'minuto' => $postData->minuto,
            ];

            if (isset($postData->jugador_entrante_id_fk) && isset($postData->jugador_saliendo_id_fk)) {
                // Cambio para el equipo local
                $cambioData['jugador_entrante_fk'] = $postData->jugador_entrante_id_fk;
                $cambioData['jugador_saliente_fk'] = $postData->jugador_saliendo_id_fk;
                $cambioData['partido_fk'] = $postData->partido_id_fk;

                $cambioModel = new CambiosModel();
                $cambioModel->save($cambioData);

            } else if (isset($postData->jugador_entrante_visita) && isset($postData->jugador_saliendo_visita)) {
                // Cambio para el equipo visitante
                $cambioData['partido_id_fk'] = $postData->partido_id_fk;
                $cambioData['nombre_jugador_saliente'] = $postData->jugador_saliendo_visita;
                $cambioData['nombre_jugador_entrante'] = $postData->jugador_entrante_visita;
                $cambioModel = new CambiosExternoModel();
                $cambioModel->save($cambioData);
            }
            
            return $this->response->setStatusCode(200, 'Cambio agregado exitosamente');
        } else {
            return $this->response->setStatusCode(405, 'Método no permitido');
        }
    }


    public function obtenerJugadoresExcluyendo($genero_equipo_local, $excluir_id) {
        $db = \Config\Database::connect();
    
        $queryJugadores = $db->query("SELECT j.id,
            CONCAT(u.nombres, ' ', u.apellidos) as nombre_jugador,
            j.numero_camiseta
            FROM jugadores j
            LEFT JOIN usuarios u ON
            j.id = u.jugador_id_fk
            WHERE genero = '{$genero_equipo_local}'
            AND j.id != {$excluir_id}");
    
        $jugadores = $queryJugadores->getResult();
    
        return $this->response->setJSON($jugadores);
    }

    public function obtenerJugadoresTarjeta($genero_equipo_local) {
        $db = \Config\Database::connect();
    
        $queryJugadores = $db->query("select j.id,
        concat(u.nombres, ' ', u.apellidos) as nombre_jugador,
        j.numero_camiseta
        from jugadores j
        left join usuarios u on
        j.id = u.jugador_id_fk
        where genero = '{$genero_equipo_local}'");
    
        $jugadores = $queryJugadores->getResult();
    
        return $this->response->setJSON($jugadores);
    }

    public function agregarTarjeta()
    {
        if ($this->request->getMethod() === 'post') {
            $postData = $this->request->getJSON();

            $tarjetaData = [
                'partido_fk' => $postData->partido_id_fk,
                'minuto' => $postData->minuto,
                'tarjeta' =>$postData->tarjeta,
            ];

            if (isset($postData->jugador_id_fk)) {
                $tarjetaData['jugador_fk'] = $postData->jugador_id_fk;
            }

            if (isset($postData->jugador_visita)) {
                $tarjetaData['jugador_externo'] = $postData->jugador_visita;
            }

            $tarjetaModel = new TarjetasModel();
            $tarjetaModel->save($tarjetaData);
            
            return $this->response->setStatusCode(200, 'Tarjeta agregado exitosamente');
        } else {
            return $this->response->setStatusCode(405, 'Método no permitido');
        }
    }
    
  
    public function __construct()
    {
        helper('form');
    }
}
