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
$routes->get('HomeSocios', 'HomeSocios::index');
$routes->get('Home', 'Home::index');
$routes->get('IniciarSesion', 'IniciarSesion::index');
$routes->get('Registrarse', 'Registrarse::index');
$routes->get('InicioSocios','VerJugadores::inicioSocios');
$routes->get('VerJugadores','VerJugadores::mostrarJugador');
$routes->get('VerCampeonatos','VerJugadores::mostrarCampeonatos');
$routes->get('AdminDashboard','AdminDashboard::Dashboard');
$routes->get('AdminJugadorDt','AdminDashboard::jugadorDatabase');
$routes->get('AdminEquipoDt','AdminDashboard::equipoDatabase');
$routes->get('DashboardSocio','DashboardSocio::index');
$routes->add('iniciar_sesion/validar_usuario', 'IniciarSesion::validar_usuario', ['post']);
$routes->add('registrarse/registrar', 'Registrarse::registrar', ['post']);
$routes->get('registro-exitoso', 'Registrarse::registroExitoso');



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
