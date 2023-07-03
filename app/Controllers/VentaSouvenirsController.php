<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use Dompdf\Dompdf;

require 'vendor/autoload.php';

use App\Models\IngresosModel;
use App\Models\VentaSouvenirsModel;
use App\Models\SouvenirModel;
use App\Models\VentaEntradasModel;

class VentaSouvenirsController extends BaseController
{
    public function cargaArticulos()
    {
        // Agregando Titulo a Cada View
        $titulo = [
            'title' => 'Campeonatos Socio',
        ];

        $db = db_connect();

        $campeonato = $db->query('SELECT DISTINCT 
            s.producto,
            s.talla,
            s.precio,
            s.genero,
            s.detalle,
            s.foto,
            s.stock,
            MIN(s.id) AS id
            FROM souvenirs s
            GROUP BY s.producto, s.talla, s.precio, s.genero, s.detalle, s.foto, s.stock;');

        $results = $campeonato->getResult();

        $data['results'] = array();

        foreach ($results as $row) {
            $data['results'][] = array(
                'id' => $row->id,
                'producto' => $row->producto,
                'talla' => $row->talla,
                'precio' => $row->precio,
                'genero' => $row->genero,
                'detalle' => $row->detalle,
                'foto' => $row->foto,
                'stock' => $row->stock
            );
        }

        $viewData = array_merge($data, $titulo);

        return view('templates/header') . view('home/venta_souvenirs', $viewData) . view('templates/footer');
    }



    public function detalleProducto($id)
    {
        $db = db_connect();
    
        $producto = $db->query("SELECT * FROM souvenirs WHERE id = '$id'");
        $result = $producto->getRow();
    
        if ($result) {
            $productoNombre = $result->producto;
            $tallas = $db->query("SELECT * FROM souvenirs WHERE producto = '$productoNombre'");
            $tallasResult = $tallas->getResult();
    
            $data['producto'] = [
                'id' => $result->id,
                'producto' => $result->producto,
                'precio' => $result->precio,
                'genero' => $result->genero,
                'detalle' => $result->detalle,
                'foto' => $result->foto,
                'tallas' => $tallasResult
            ];
        } else {
            // Si no se encontró ningún resultado para el ID, puedes manejar el error o redirigir a una página de error, por ejemplo:
            return redirect()->to('/error');
        }
    
        return view('templates/header') . view('home/detalle_producto', $data) . view('templates/footer');
    }
    

    public function agregarProducto()
    {
        $productoId = $this->request->getPost('id');
        $talla = $this->request->getPost('talla');
    
        $carro = session('carro') ?: [];
    
        // Generar una clave única para el producto con la talla seleccionada
        $productoTallaId = $productoId . '-' . $talla;
    
        if (isset($carro[$productoTallaId])) {
            $carro[$productoTallaId] += 1;
        } else {
            $carro[$productoTallaId] = 1;
        }
    
        session()->set('carro', $carro);
        session()->setFlashdata('success', 'Producto agregado al carro correctamente');
        return redirect()->back();
    }
    

    public function mostrarCarro()
    {
        $carro = session('carro') ?: [];
        $productos = [];
    
        $db = db_connect();
        $productosModel = $db->table('souvenirs');
    
        $total = 0;
    
        foreach ($carro as $productoTallaId => $cantidad) {
            // Dividir el productoTallaId en productoId y talla
            list($productoId, $talla) = explode('-', $productoTallaId, 2);
    
            $producto = $productosModel->where('id', $productoId)->get()->getRow();
    
            if ($producto !== null) {
                $productos[] = [
                    'id' => $producto->id,
                    'nombre' => $producto->producto,
                    'foto' => $producto->foto,
                    'precio' => $producto->precio,
                    'cantidad' => $cantidad,
                    'talla' => $talla,  // Usar la talla del carro
                ];
    
                $total += floatval($producto->precio) * intval($cantidad);
            }
        }
    
        // Almacenar los productos en la sesión
        session()->set('productos', $productos);
    
        $data['productos'] = $productos;
        $data['total'] = $total;
    
        $titulo = [
            'title' => 'Carro de Compras',
        ];
    
        $viewData = array_merge($data, $titulo);
    
        return view('templates/header') . view('home/carro_compras', $viewData) . view('templates/footer');
    }
    

    public function vaciarCarro()
    {
        session()->remove('carro');

        return redirect()->to(base_url('TiendaOficial'));
    }

    public function eliminarProducto($productoTallaId)
    {
        $carro = session('carro') ?: [];
    
        if (isset($carro[$productoTallaId])) {
            if ($carro[$productoTallaId] > 1) {
                $carro[$productoTallaId] -= 1;
            } else {
                unset($carro[$productoTallaId]);
            }
            session()->set('carro', $carro);
        }
    
        return redirect()->to('CarroCompras');
    }     

    public function checkout()
    {
        $carro = session('carro') ?: [];
        $db = db_connect();
        $productosModel = $db->table('souvenirs');
    
        // Verificar si hay suficiente stock para cada producto en el carro
        foreach ($carro as $productoTallaId => $cantidad) {
            list($productoId, $talla) = explode('-', $productoTallaId, 2);
    
            // Obtener el nombre del producto en base al id proporcionado.
            $productoNombre = $db->table('souvenirs')->where('id', $productoId)->get()->getRow()->producto;
    
            if ($talla == null) {
                // Si la talla es null, buscar el producto por id
                $producto = $productosModel->where(['producto' => $productoNombre])->get()->getRow();
            } else {
                // Si la talla no es null, buscar el producto por nombre y talla
                $producto = $productosModel->where(['producto' => $productoNombre, 'talla' => $talla])->get()->getRow();
            }
    
            if ($producto !== null && $producto->stock < $cantidad) {
                session()->setFlashdata('error', "Lo sentimos, no queda suficiente stock para {$producto->producto} de talla {$talla}. Por favor, ajusta la cantidad o elimina el artículo de tu carrito.");
                return redirect()->to('/VentaSouvenirsController/mostrarCarro');
            }
        }
    
        $titulo = [
            'title' => 'Checkout',
        ];
    
        return view('templates/header') . view('home/checkout', $titulo) . view('templates/footer');
    }   
      

    public function confirmarCompra()
    {
        $nombre = $this->request->getPost('nombre');
        $telefono = $this->request->getPost('telefono');
        $entrega = $this->request->getPost('entrega');
        $direccion = $this->request->getPost('direccion');

        // Obtener datos del carro
        $carro = session('carro') ?: [];
        $montoCompra = 0;
        $articulosVendidos = '';

        $db = db_connect();
        $productosModel = $db->table('souvenirs');

        foreach ($carro as $productoId => $cantidad) {
            $producto = $productosModel->where('id', $productoId)->get()->getRow();

            if ($producto !== null) {
                $precioUnitario = floatval($producto->precio);
                $subtotal = $precioUnitario * intval($cantidad);
                $montoCompra += $subtotal;

                $articulosVendidos .= "Producto: {$producto->producto}, Precio Unitario: {$precioUnitario}, Cantidad: {$cantidad}, Subtotal: {$subtotal}\n";
            }
        }

        // Verificar el método de entrega y agregar el monto de envío si es despacho
        if ($entrega === 'despacho') {
            $montoCompra += 10000;
            $articulosVendidos .= "Envío: 10000\n";
        }

        // Generar registro en la tabla venta_souvenirs
        $fecha_compra = date('Y-m-d H:i:s');
        $ventaSouvenirsData = [
            'monto_compra' => $montoCompra,
            'articulos_vendidos' => $articulosVendidos,
            'nombre_comprador' => $nombre,
            'telefono_comprador' => $telefono,
            'direccion_envio' => $direccion,
            'fecha_compra' => $fecha_compra,
            'metodo' => $entrega
        ];

        $ventaSouvenirsModel = new VentaSouvenirsModel();
        $ventaSouvenirsModel->insert($ventaSouvenirsData);
        $ventaSouvenirsId = $ventaSouvenirsModel->insertID();

        // Generar registro en la tabla ingresos
        $ingresosData = [
            'concepto' => 'venta_souvenirs',
            'monto' => $montoCompra,
            'fecha' => date('Y-m-d'),
            'detalle' => 'venta de souvenirs con ' . $entrega
        ];

        $ingresosModel = new IngresosModel();
        $ingresosModel->insert($ingresosData);

        foreach ($carro as $productoId => $cantidad) {
            $producto = $productosModel->where('id', $productoId)->get()->getRow();

            if ($producto !== null) {
                $productos[] = [
                    'nombre' => $producto->producto,
                    'precio' => $producto->precio,
                    'cantidad' => $cantidad,
                    'talla' => $producto->talla
                ];

                //$total += floatval($producto->precio) * intval($cantidad);
            }
        }

        $productos = session('productos');

        // Actualizar el stock de cada producto vendido
        foreach ($productos as $producto) {
            $nombre = $producto['nombre'];
            $talla = $producto['talla'];
            $cantidad = $producto['cantidad'];
            if($talla == null){
                $db->query("UPDATE souvenirs SET stock = stock - '{$cantidad}' WHERE producto = '{$nombre}'");
            }
            else{
                $db->query("UPDATE souvenirs SET stock = stock - '{$cantidad}' WHERE producto = '{$nombre}' AND talla = '{$talla}'");
            }  
        }

        $html = view('pdf/compra', [
            'idCompra' => $ventaSouvenirsId,
            'nombre' => $nombre,
            'telefono' => $telefono,
            'entrega' => $entrega,
            'direccion' => $direccion,
            'productos' => $productos,
            'total' => $montoCompra,
        ]);        

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Renderiza el PDF
        $dompdf->render();

        // Genera el nombre del archivo PDF
        $filename = 'boleta_compra_' . date('YmdHis') . '.pdf';

        $output = $dompdf->output();

        $response = $this->response
        ->setHeader('Content-Type', 'application/pdf')
        ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
        ->setBody($output);

    
        // ... (la mayoría del código se ha omitido para enfocarnos en las modificaciones relevantes)
    
        session()->remove('carro');
        session()->remove('productos');
    
        // Redirige a TiendaOficial después de descargar el PDF
        echo '<script>window.location.href = "' . base_url('TiendaOficial') . '";</script>';
    
        return $response;
    }
    
    public function loadVentaEntradas() {
        $db = db_connect();
        
        $partidos = $db->query("SELECT p.id, p.fecha , e.nombre AS nombre_equipo_local,
            e2.nombre AS nombre_equipo_visita,
            c.nombre AS campeonato,
            c2.nombre AS nombre_cancha,
            c2.ubicacion 
            FROM partidos p 
            LEFT JOIN equipos e ON 
            e.id = p.equipo_local_fk
            LEFT JOIN equipos e2 ON
            e2.id = p.equipo_visita_fk
            LEFT JOIN campeonatos c ON
            c.id = p.campeonato_id_fk 
            LEFT JOIN cancha c2 ON
            c2.id = p.ubicacion_fk 
            WHERE p.fecha >= CURDATE()
            ORDER BY p.fecha");
        
        $results = $partidos->getResult();

        $data['results'] = array();
        foreach ($results as $row) {
            $data['results'][] = array(
                'id' => $row->id,
                'fecha' => $row->fecha,
                'nombre_equipo_local' => $row->nombre_equipo_local,
                'nombre_equipo_visita' => $row->nombre_equipo_visita,
                'campeonato' => $row->campeonato,
                'nombre_cancha' => $row->nombre_cancha,
                'ubicacion' => $row->ubicacion
            );
        }

        $viewData = array_merge($data, ['title' => 'Venta de Entradas']);
        
        echo view('templates/header') . view('home/compra_entradas', $viewData) . view('templates/footer');
    }

    public function datosComprador($partidoId)
    {
        $titulo = [
            'title' => 'datosComprador',
            'id' => $partidoId, // Pasamos la id a la vista
        ];

        return view('templates/header') . view('home/datos_comprador_entrada', $titulo) . view('templates/footer');
    }


    public function confirmarCompraEntrada()
    {
        // Recoger los datos enviados desde la vista
        $nombre_comprador = $this->request->getPost('nombre_comprador');
        $rut_comprador = $this->request->getPost('rut_comprador');
        $id_partido_fk = $this->request->getPost('partidoId');
        $monto = 5000;  // Monto fijo de entrada

        $db = db_connect();

        $query = $db->query("SELECT p.id, p.fecha, e.nombre AS nombre_equipo_local, e2.nombre AS nombre_equipo_visita,
        c.nombre AS campeonato, c2.nombre AS nombre_cancha, c2.ubicacion FROM partidos p LEFT JOIN equipos e ON e.id = p.equipo_local_fk 
        LEFT JOIN equipos e2 ON e2.id = p.equipo_visita_fk 
        LEFT JOIN campeonatos c ON c.id = p.campeonato_id_fk 
        LEFT JOIN cancha c2 ON c2.id = p.ubicacion_fk WHERE p.id = '$id_partido_fk'");
        $results = $query->getResult();

        $nombre_equipo_local = null;
        $nombre_equipo_visita = null;
        $campeonato = null;
        $nombre_cancha = null;

        foreach ($results as $row) {
            $nombre_equipo_local = $row->nombre_equipo_local;
            $nombre_equipo_visita = $row->nombre_equipo_visita;
            $campeonato = $row->campeonato;
            $nombre_cancha = $row->nombre_cancha;

            $data['results'][] = array(
                'id' => $row->id,
                'fecha' => $row->fecha,
                'nombre_equipo_local' => $nombre_equipo_local,
                'nombre_equipo_visita' => $nombre_equipo_visita,
                'campeonato' => $campeonato,
                'nombre_cancha' => $nombre_cancha,
                'ubicacion' => $row->ubicacion
            );
        }
        
        // Crear una nueva entrada en la tabla venta_entradas
        $ventaEntradasData = [
            'monto' => $monto,
            'nombre_comprador' => $nombre_comprador,
            'rut_comprador' => $rut_comprador,
            'id_partido_fk' => $id_partido_fk
        ];
        $ventaEntradasModel = new VentaEntradasModel();
        $ventaEntradasModel->insert($ventaEntradasData);

        // Obtener la ID de la venta insertada
        $id_venta = $ventaEntradasModel->insertID();

        // Crear una nueva entrada en la tabla ingresos
        $fecha = date('Y-m-d');
        $detalle = 'Venta de entradas';
        $ingresosData = [
            'concepto' => 'venta_entradas',
            'monto' => $monto,
            'fecha' => $fecha,
            'detalle' => $detalle
        ];
        $ingresosModel = new IngresosModel();
        $ingresosModel->insert($ingresosData);

        $html = view('pdf/compra_entradas',[
            'id_venta' => $id_venta,
            'nombre_comprador' => $nombre_comprador,
            'rut_comprador' => $rut_comprador,
            'nombre_equipo_local' => $nombre_equipo_local,
            'nombre_equipo_visita' => $nombre_equipo_visita,
            'campeonato' => $campeonato,
            'nombre_cancha' => $nombre_cancha,
            'monto' => $monto
        ]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Renderiza el PDF
        $dompdf->render();

        // Genera el nombre del archivo PDF
        $filename = 'boleta_compra_' . date('YmdHis') . '.pdf';

        $output = $dompdf->output();

        $response = $this->response
        ->setHeader('Content-Type', 'application/pdf')
        ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
        ->setBody($output);

        echo '<script>window.location.href = "' . base_url('VentaEntradas') . '";</script>';

        return $response;
    }

    public function __construct()
    {
        helper('form');
        //helper('session');
        //helper('encryption');
    }
}