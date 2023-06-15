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
$routes->get('HomeSocios', 'Home::homesocios');
$routes->get('Home', 'Home::index');
$routes->get('IniciarSesion', 'Home::homeiniciosesion');
$routes->get('Registrarse', 'Home::register');
$routes->get('ActividadesEspeciales', 'Home::ActividadesEspeciales');
$routes->get('ProximoPartido', 'Home::proximoPartido');
//Rutas Socio / Perfile0s
$routes->get('InicioSocios', 'SocioController::inicioSocios', ['filter' => 'SesionSocio']);
$routes->get('VerJugadores', 'SocioController::mostrarJugador', ['filter' => 'SesionSocio']);
$routes->get('VerCampeonatos', 'SocioController::mostrarCampeonatos', ['filter' => 'SesionSocio']);
$routes->get('VerPartidos', 'SocioController::verPartidos', ['filter' => 'SesionSocio']);
$routes->get('VerMensualidad', 'SocioController::verMensualidad', ['filter' => 'SesionSocio']);
$routes->post('VerMensualidad', 'SocioController::verMensualidad', ['filter' => 'SesionSocio']);
$routes->get('PerfilSocio', 'SocioController::verSocioUsuario', ['filter' => 'SesionSocio']);
$routes->get('EditarUsuario', 'SocioController::guardaSocioUsuario', ['filter' => 'SesionSocio']);
$routes->post('EditarUsuario', 'SocioController::guardaSocioUsuario', ['filter' => 'SesionSocio']);
$routes->get('EstadisticasSocio', 'SocioController::socioverEstadisticas', ['filter' => 'SesionSocio']);
$routes->get('boletaMensualidad', 'SocioController::boletaMensualidad', ['filter' => 'SesionSocio']);
$routes->get('EquipoTecnicoSocio', 'SocioController::socioverEquipoTecnico', ['filter' => 'SesionSocio']);
$routes->get('HistorialPagos', 'SocioController::historialPagos', ['filter' => 'SesionSocio']);
//Rutas Admin
$routes->get('AdminDashboard', 'AdminDashboard::Dashboard', ['filter' => 'SesionAdmin']);
$routes->get('AdminJugadorDt', 'AdminDashboard::jugadorDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminUsuarioDt', 'AdminDashboard::usuarioDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminEquipoTecnicoDt', 'AdminDashboard::equipotecnicoDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminEquipoDt', 'AdminDashboard::equipoDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminSocioDt', 'AdminDashboard::socioDatabase', ['filter' => 'SesionAdmin']);
//Rutas Direccion - Detalle, le saque filter a sponsor por caso ver-sponsor en socio, revisar
$routes->get('DireccionHome', 'DireccionDashboard::direccionDashboard', ['filter' => 'SesionDirector']);
$routes->get('AgregarSponsor', 'SponsorController::registrar');
$routes->post('AgregarSponsor', 'SponsorController::registrar');
$routes->post('IngresosEspeciales', 'DireccionDashboard::ingresosEspeciales', ['filter' => 'SesionDirector']);
$routes->get('IngresosEspeciales', 'DireccionDashboard::ingresosEspeciales', ['filter' => 'SesionDirector']);
$routes->get('AgregarIngreso', 'IngresoController::registrar', ['filter' => 'SesionDirector']);
$routes->post('AgregarIngreso', 'IngresoController::registrar', ['filter' => 'SesionDirector']);
$routes->get('PagoJugadores', 'EgresoController::registrarPagoJugadores', ['filter' => 'SesionDirector']);
$routes->post('PagoJugadores', 'EgresoController::registrarPagoJugadores', ['filter' => 'SesionDirector']);
$routes->get('PagoEquipoTecnico', 'EgresoController::PagarSueldoEquipoTecnico', ['filter' => 'SesionDirector']);
$routes->post('PagoEquipoTecnico', 'EgresoController::PagarSueldoEquipoTecnico', ['filter' => 'SesionDirector']);
$routes->get('PagoDirigente', 'EgresoController::PagarSueldoDirigente', ['filter' => 'SesionDirector']);
$routes->post('PagoDirigente', 'EgresoController::PagarSueldoDirigente', ['filter' => 'SesionDirector']);
$routes->get('PagoMensualidadAnfa', 'EgresoController::pagarMensualidadAnfa', ['filter' => 'SesionDirector']);
$routes->post('PagoMensualidadAnfa', 'EgresoController::pagarMensualidadAnfa', ['filter' => 'SesionDirector']);
$routes->get('VentaJugadores', 'VentaJugadorController::registrarVentaJugadores', ['filter' => 'SesionDirector']);
$routes->post('VentaJugadores', 'VentaJugadorController::registrarVentaJugadores', ['filter' => 'SesionDirector']);
$routes->get('EquipoTecnicoDireccion', 'DireccionDashboard::direccionverEquipoTecnico', ['filter' => 'SesionDirector']);
$routes->get('CampeonatosDireccion', 'DireccionDashboard::direccionverCampeonatos', ['filter' => 'SesionDirector']);
$routes->get('EstadisticasDireccion', 'DireccionDashboard::direccionverEstadisticas', ['filter' => 'SesionDirector']);
$routes->get('JugadoresDireccion', 'DireccionDashboard::direccionverJugadores', ['filter' => 'SesionDirector']);
$routes->get('PartidosDireccion', 'DireccionDashboard::direccionverPartidos', ['filter' => 'SesionDirector']);
$routes->get('HistorialPagosDireccion', 'DireccionDashboard::direccionverHistorialPagos', ['filter' => 'SesionDirector']);
$routes->get('CompraJugadores', 'CompraJugadorController::index', ['filter' => 'SesionDirector']);
$routes->post('CompraJugadores', 'CompraJugadorController::index', ['filter' => 'SesionDirector']);
$routes->get('obtenerEquipos/(:any)', 'CompraJugadorController@obtenerEquipos/$1', ['filter' => 'SesionDirector']);
$routes->get('PerfilDireccion', 'DireccionDashboard::verDireccionUsuario', ['filter' => 'SesionDirector']);
$routes->get('EditarUsuarioDireccion', 'DireccionDashboard::guardaDireccionUsuario', ['filter' => 'SesionDirector']);
$routes->post('EditarUsuarioDireccion', 'DireccionDashboard::guardaDireccionUsuario', ['filter' => 'SesionDirector']);
//Guardar Jugador Direccion
$routes->get('RegistrarNuevoJugador', 'RegistrarJugadorController::index' , ['filter' => 'SesionDirector']);
$routes->post('RegistrarNuevoJugador', 'RegistrarJugadorController::registrar', ['filter' => 'SesionDirector']);
$routes->get('RegistrarJugadorController/obtenerEquiposPorGenero/(:segment)', 'RegistrarJugadorController::obtenerEquiposPorGenero/$1', ['filter' => 'SesionDirector']);
$routes->get('obtenerEquiposPorGenero/(:any)', 'RegistrarJugadorController::obtenerEquiposPorGenero/$1', ['filter' => 'SesionDirector']);
$routes->get('RegistrarNuevoUsuario', 'RegistrarJugadorController::index', ['filter' => 'SesionDirector']);
$routes->get('RegistrarNuevoEquipoTecnico', 'RegistrarEquipoTecnicoController::index' , ['filter' => 'SesionDirector']);
$routes->post('RegistrarNuevoEquipoTecnico', 'RegistrarEquipoTecnicoController::registrar' , ['filter' => 'SesionDirector']);
$routes->get('RegistrarNuevoEquipoTecnicoController/obtenerEquipos/(:segment)', 'RegistrarNuevoEquipoTecnicoController::obtenerEquipos/$1' , ['filter' => 'SesionDirector']);
$routes->post('RegistrarNuevoEquipoTecnicoController/registrarUsuario', 'RegistrarNuevoEquipoTecnicoController::registrarUsuario' , ['filter' => 'SesionDirector']);
//Rutas Jugador
$routes->get('InicioJugador', 'JugadorController::Dashboard', ['filter' => 'SesionJugador']);
$routes->get('JugadoresJugador', 'JugadorController::jugadorverJugadores', ['filter' => 'SesionJugador']);
$routes->get('CampeonatosJugador', 'JugadorController::jugadorverCampeonatos', ['filter' => 'SesionJugador']);
$routes->get('PartidosJugador', 'JugadorController::jugadorverPartidos', ['filter' => 'SesionJugador']);
$routes->get('EstadisticasJugador', 'JugadorController::jugadorverEstadisticas', ['filter' => 'SesionJugador']);
$routes->get('EquipoTecnicoJugador', 'JugadorController::jugadorverEquipoTecnico', ['filter' => 'SesionJugador']);
$routes->get('PerfilJugador', 'JugadorController::verJugadorUsuario', ['filter' => 'SesionJugador']);
$routes->get('EditarUsuarioJugador', 'JugadorController::guardaJugadorUsuario', ['filter' => 'SesionJugador']);
$routes->post('EditarUsuarioJugador', 'JugadorController::guardaJugadorUsuario', ['filter' => 'SesionJugador']);
//Rutas Equipo Tecnico
$routes->get('InicioEquipoTecnico', 'EquipoTecnicoController::Dashboard', ['filter' => 'SesionEquipoTecnico']);
$routes->get('JugadoresEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverJugadores', ['filter' => 'SesionEquipoTecnico']);
$routes->get('CampeonatosEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverCampeonatos', ['filter' => 'SesionEquipoTecnico']);
$routes->get('PartidosEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverPartidos', ['filter' => 'SesionEquipoTecnico']);
$routes->get('EstadisticasEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverEstadisticas', ['filter' => 'SesionEquipoTecnico']);
$routes->get('EquipoTecnicoEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverEquipoTecnico', ['filter' => 'SesionEquipoTecnico']);
$routes->get('PerfilEquipoTecnico', 'EquipoTecnicoController::verEquipoTecnicoUsuario', ['filter' => 'SesionEquipoTecnico']);
$routes->get('EditarUsuarioEquipoTecnico', 'EquipoTecnicoController::guardaEquipoTecnicoUsuario', ['filter' => 'SesionEquipoTecnico']);
$routes->post('EditarUsuarioEquipoTecnico', 'EquipoTecnicoController::guardaEquipoTecnicoUsuario', ['filter' => 'SesionEquipoTecnico']);
//Botones Admin
$routes->get('AdminDashboard/borrarUsuario', 'AdminDashboard::borrarUsuario', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarEquipo', 'AdminDashboard::borrarEquipo', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarJugador', 'AdminDashboard::borrarJugador', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaJugador', 'AdminDashboard::guardaJugador', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaUsuario', 'AdminDashboard::guardaUsuario', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaEquipo', 'AdminDashboard::guardaEquipo', ['filter' => 'SesionAdmin']);
//Rutas Aplicacion Movil
//login
$routes->post('Home/validarIngresoMovil', 'Home::validarIngresoMovil');
//dashboard Movil
$routes->get('ReporteEstadisticasMovil', 'SocioController::getReporteEstadisticasMovil');
//Cerrar sesion Movil
$routes->get('/logoutM', 'Home::cerrarSesionMovil');




//RUTAS INICIO Y REGISTER
//$routes->get('logout/login', 'SocioController::inicioSocios');
$routes->get('/logout', 'Home::cerrarSesion');
$routes->post('Home/validarIngreso', 'Home::validarIngreso');
//Buscar  /register
$routes->match(['get', 'post'], '/register', 'Home::register');



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
