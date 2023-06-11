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



// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
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
