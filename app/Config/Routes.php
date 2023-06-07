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
$routes->get('HomeSocios', 'Home::homesocios');
$routes->get('Home', 'Home::index');
$routes->get('IniciarSesion', 'Home::homeiniciosesion');
$routes->get('Registrarse', 'Home::homeregistro');
$routes->get('InicioSocios','SocioController::inicioSocios');
$routes->get('VerJugadores','SocioController::mostrarJugador');
$routes->get('VerCampeonatos','SocioController::mostrarCampeonatos');
$routes->get('AdminDashboard','AdminDashboard::Dashboard');
$routes->get('AdminJugadorDt','AdminDashboard::jugadorDatabase');
$routes->get('AdminUsuarioDt','AdminDashboard::usuarioDatabase');
$routes->get('AdminEquipoDt','AdminDashboard::equipoDatabase');
$routes->get('AdminDashboard/borrarUsuario', 'AdminDashboard::borrarUsuario');
$routes->get('AdminDashboard/borrarEquipo', 'AdminDashboard::borrarEquipo');
$routes->get('AdminDashboard/borrarJugador', 'AdminDashboard::borrarJugador');
$routes->post('AdminDashboard/guardaJugador', 'AdminDashboard::guardaJugador');
$routes->post('AdminDashboard/guardaUsuario', 'AdminDashboard::guardaUsuario');
$routes->post('AdminDashboard/guardaEquipo', 'AdminDashboard::guardaEquipo');
//RUTAS INICIO Y REGISTER
//$routes->get('/login', 'SocioController::inicioSocios');
$routes->post('Home/validarIngreso', 'Home::validarIngreso');
//Buscar Logout y /register
$routes->match(['get', 'post'], 'logout', 'Home::cerrarSesion');
$routes->match(['get', 'post'], '/register', 'Home::register');




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
