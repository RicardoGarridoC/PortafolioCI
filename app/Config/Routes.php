<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
//RUTA EXTRA
$routes->setAutoRoute(true);

//Rutas Hechas
//Rutas Home
$routes->get('Sesion', 'Home::homesocios');
$routes->get('Home', 'Home::index');
$routes->get('IniciarSesion', 'Home::homeiniciosesion');
$routes->get('Registrarse', 'Home::register');
$routes->get('Blog', 'Home::homeBlog');
$routes->get('Contacto', 'Home::homeContacto');
$routes->get('Portafolio', 'Home::homePortafolio');
$routes->get('Servicios', 'Home::homeServicios');
$routes->get('ActividadesEspeciales', 'Home::ActividadesEspeciales');
$routes->get('ProximoPartido', 'Home::proximoPartido');
//Rutas Socio / Perfile0s
$routes->get('InicioSocios', 'SocioController::inicioSocios', ['filter' => 'SesionAdmin:socio']);
$routes->get('VerJugadores', 'SocioController::mostrarJugador', ['filter' => 'SesionAdmin:socio']);
$routes->get('VerCampeonatos', 'SocioController::mostrarCampeonatos', ['filter' => 'SesionAdmin:socio']);
$routes->get('VerPartidos', 'SocioController::verPartidos', ['filter' => 'SesionAdmin:socio']);
$routes->get('VerReportes', 'SocioController::verReportes', ['filter' => 'SesionAdmin:socio']);
$routes->get('EstadisticasJugadores', 'SocioController::verEstadisticasJugadores', ['filter' => 'SesionAdmin:socio']);

//Rutas Admin
$routes->get('AdminDashboard', 'AdminDashboard::Dashboard', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminJugadorDt', 'AdminDashboard::jugadorDatabase', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminUsuarioDt', 'AdminDashboard::usuarioDatabase', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminEquipoTecnicoDt', 'AdminDashboard::equipotecnicoDatabase', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminEquipoDt', 'AdminDashboard::equipoDatabase', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminSocioDt', 'AdminDashboard::socioDatabase', ['filter' => 'SesionAdmin:administrador']);
//Rutas Direccion
$routes->get('DireccionDashboard', 'DireccionDashboard::Dashboard', ['filter' => 'SesionDirector:direccion']);
//Botones Admin
$routes->get('AdminDashboard/borrarUsuario', 'AdminDashboard::borrarUsuario', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminDashboard/borrarEquipo', 'AdminDashboard::borrarEquipo', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminDashboard/borrarJugador', 'AdminDashboard::borrarJugador', ['filter' => 'SesionAdmin:administrador']);
$routes->post('AdminDashboard/guardaJugador', 'AdminDashboard::guardaJugador', ['filter' => 'SesionAdmin:administrador']);
$routes->post('AdminDashboard/guardaUsuario', 'AdminDashboard::guardaUsuario', ['filter' => 'SesionAdmin:administrador']);
$routes->post('AdminDashboard/guardaEquipo', 'AdminDashboard::guardaEquipo', ['filter' => 'SesionAdmin:administrador']);

//RUTAS INICIO Y REGISTER
//$routes->get('/login', 'SocioController::inicioSocios');
$routes->post('Home/validarIngreso', 'Home::validarIngreso');
//Buscar Logout y /register
$routes->get('/logout', 'Home::cerrarSesion');
$routes->match(['get', 'post'], '/register', 'Home::register');
//prueba
$routes->get('UltimoPartido', 'UltimoPartidoController::MostrarPartido');
$routes->get('InfoGoles', 'InfoGolesController::MostrarInfoGoles');
$routes->get('Cambios', 'CambiosController::MostrarCambios');
//-------------------------------------------------------------------------------------
//nuevas vistas ricardo

//para todas estas vistas se debe modificar el archivo view ya que extiende el formato desde 
//el sidebar socio, deben colocar que extienda desde el sidebardireccion o como se llame
//también deben agregar el tema de que la sesión esté activa

    //esta vista es para agregar un nuevo sponsor, debe estar en un botón en direccion
    $routes->get('AgregarSponsor', 'SponsorController::registrar');
    $routes->post('AgregarSponsor', 'SponsorController::registrar');

    //esta vista contiene ingreso por sponsor o actividades especiales, debe estar en un botón en direccion
    $routes->get('AgregarIngreso', 'IngresoController::registrar');
    $routes->post('AgregarIngreso', 'IngresoController::registrar');
    //esta vista contiene el pago de sueldos a jugadores, tambien como botón en direccion
    $routes->get('PagoJugadores', 'EgresoController::registrarPagoJugadores');
    $routes->post('PagoJugadores', 'EgresoController::registrarPagoJugadores');
    //esta vista contiene el pago de sueldo a miembros del equipo tecnico, boton en direccion
    $routes->get('PagoEquipoTecnico', 'EgresoController::PagarSueldoEquipoTecnico');
    $routes->post('PagoEquipoTecnico', 'EgresoController::PagarSueldoEquipoTecnico');
    //esta vista contiene el pago a dirigentes, boton en direccion
    $routes->get('PagoDirigente', 'EgresoController::PagarSueldoDirigente');
    $routes->post('PagoDirigente', 'EgresoController::PagarSueldoDirigente');
    //esta vista contiene el pago de mensualidad a la anfa, boton en direccion
    $routes->get('PagoMensualidadAnfa', 'EgresoController::pagarMensualidadAnfa');
    $routes->post('PagoMensualidadAnfa', 'EgresoController::pagarMensualidadAnfa');

//-----------------------------------------------------------------------------------------

$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
