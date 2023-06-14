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
$routes->get('InicioSocios', 'SocioController::inicioSocios', ['filter' => 'SesionSocio:socio']);
$routes->get('VerJugadores', 'SocioController::mostrarJugador', ['filter' => 'SesionSocio:socio']);
$routes->get('VerCampeonatos', 'SocioController::mostrarCampeonatos', ['filter' => 'SesionSocio:socio']);
$routes->get('VerPartidos', 'SocioController::verPartidos', ['filter' => 'SesionSocio:socio']);
$routes->get('VerMensualidad', 'SocioController::verMensualidad', ['filter' => 'SesionSocio:socio']);
$routes->post('VerMensualidad', 'SocioController::verMensualidad', ['filter' => 'SesionSocio:socio']);
$routes->get('PerfilSocio', 'SocioController::verSocioUsuario', ['filter' => 'SesionSocio:socio']);
$routes->get('EditarUsuario', 'SocioController::guardaSocioUsuario', ['filter' => 'SesionSocio:socio']);
$routes->post('EditarUsuario', 'SocioController::guardaSocioUsuario', ['filter' => 'SesionSocio:socio']);
$routes->get('EstadisticasSocio', 'SocioController::socioverEstadisticas', ['filter' => 'SesionSocio:socio']);
$routes->get('boletaMensualidad', 'SocioController::boletaMensualidad', ['filter' => 'SesionSocio:socio']);
$routes->get('EquipoTecnicoSocio', 'SocioController::socioverEquipoTecnico', ['filter' => 'SesionSocio:socio']);
$routes->get('HistorialPagos', 'SocioController::historialPagos', ['filter' => 'SesionSocio:socio']);
//Rutas Admin
$routes->get('AdminDashboard', 'AdminDashboard::Dashboard', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminJugadorDt', 'AdminDashboard::jugadorDatabase', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminUsuarioDt', 'AdminDashboard::usuarioDatabase', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminEquipoTecnicoDt', 'AdminDashboard::equipotecnicoDatabase', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminEquipoDt', 'AdminDashboard::equipoDatabase', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminSocioDt', 'AdminDashboard::socioDatabase', ['filter' => 'SesionAdmin:administrador']);
//Rutas Direccion - Detalle, le saque filter a sponsor por caso ver-sponsor en socio, revisar
$routes->get('DireccionHome', 'DireccionDashboard::direccionDashboard', ['filter' => 'SesionDirector:direccion']);
$routes->get('AgregarSponsor', 'SponsorController::registrar');
$routes->post('AgregarSponsor', 'SponsorController::registrar');
$routes->post('IngresosEspeciales', 'DireccionDashboard::ingresosEspeciales', ['filter' => 'SesionDirector:direccion']);
$routes->get('IngresosEspeciales', 'DireccionDashboard::ingresosEspeciales', ['filter' => 'SesionDirector:direccion']);
$routes->get('AgregarIngreso', 'IngresoController::registrar', ['filter' => 'SesionDirector:direccion']);
$routes->post('AgregarIngreso', 'IngresoController::registrar', ['filter' => 'SesionDirector:direccion']);
$routes->get('PagoJugadores', 'EgresoController::registrarPagoJugadores', ['filter' => 'SesionDirector:direccion']);
$routes->post('PagoJugadores', 'EgresoController::registrarPagoJugadores', ['filter' => 'SesionDirector:direccion']);
$routes->get('PagoEquipoTecnico', 'EgresoController::PagarSueldoEquipoTecnico', ['filter' => 'SesionDirector:direccion']);
$routes->post('PagoEquipoTecnico', 'EgresoController::PagarSueldoEquipoTecnico', ['filter' => 'SesionDirector:direccion']);
$routes->get('PagoDirigente', 'EgresoController::PagarSueldoDirigente', ['filter' => 'SesionDirector:direccion']);
$routes->post('PagoDirigente', 'EgresoController::PagarSueldoDirigente', ['filter' => 'SesionDirector:direccion']);
$routes->get('PagoMensualidadAnfa', 'EgresoController::pagarMensualidadAnfa', ['filter' => 'SesionDirector:direccion']);
$routes->post('PagoMensualidadAnfa', 'EgresoController::pagarMensualidadAnfa', ['filter' => 'SesionDirector:direccion']);
$routes->get('VentaJugadores', 'VentaJugadorController::registrarVentaJugadores', ['filter' => 'SesionDirector:direccion']);
$routes->post('VentaJugadores', 'VentaJugadorController::registrarVentaJugadores', ['filter' => 'SesionDirector:direccion']);
$routes->get('EquipoTecnicoDireccion', 'DireccionDashboard::direccionverEquipoTecnico', ['filter' => 'SesionDirector:direccion']);
$routes->get('CampeonatosDireccion', 'DireccionDashboard::direccionverCampeonatos', ['filter' => 'SesionDirector:direccion']);
$routes->get('EstadisticasDireccion', 'DireccionDashboard::direccionverEstadisticas', ['filter' => 'SesionDirector:direccion']);
$routes->get('JugadoresDireccion', 'DireccionDashboard::direccionverJugadores', ['filter' => 'SesionDirector:direccion']);
$routes->get('PartidosDireccion', 'DireccionDashboard::direccionverPartidos', ['filter' => 'SesionDirector:direccion']);
$routes->get('HistorialPagosDireccion', 'DireccionDashboard::direccionverHistorialPagos', ['filter' => 'SesionDirector:direccion']);
//Rutas Jugador
$routes->get('InicioJugador', 'JugadorController::Dashboard', ['filter' => 'SesionJugador:jugador']);
$routes->get('JugadoresJugador', 'JugadorController::jugadorverJugadores', ['filter' => 'SesionJugador:jugador']);
$routes->get('CampeonatosJugador', 'JugadorController::jugadorverCampeonatos', ['filter' => 'SesionJugador:jugador']);
$routes->get('PartidosJugador', 'JugadorController::jugadorverPartidos', ['filter' => 'SesionJugador:jugador']);
$routes->get('EstadisticasJugador', 'JugadorController::jugadorverEstadisticas', ['filter' => 'SesionJugador:jugador']);
$routes->get('EquipoTecnicoJugador', 'JugadorController::jugadorverEquipoTecnico', ['filter' => 'SesionJugador:jugador']);
//Rutas Equipo Tecnico
$routes->get('InicioEquipoTecnico', 'EquipoTecnicoController::Dashboard', ['filter' => 'SesionJugador:equipo_tecnico']);
$routes->get('JugadoresEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverJugadores', ['filter' => 'SesionJugador:equipo_tecnico']);
$routes->get('CampeonatosEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverCampeonatos', ['filter' => 'SesionJugador:equipo_tecnico']);
$routes->get('PartidosEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverPartidos', ['filter' => 'SesionJugador:equipo_tecnico']);
$routes->get('EstadisticasEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverEstadisticas', ['filter' => 'SesionJugador:equipo_tecnico']);
$routes->get('EquipoTecnicoEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverEquipoTecnico', ['filter' => 'SesionJugador:equipo_tecnico']);
//Botones Admin
$routes->get('AdminDashboard/borrarUsuario', 'AdminDashboard::borrarUsuario', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminDashboard/borrarEquipo', 'AdminDashboard::borrarEquipo', ['filter' => 'SesionAdmin:administrador']);
$routes->get('AdminDashboard/borrarJugador', 'AdminDashboard::borrarJugador', ['filter' => 'SesionAdmin:administrador']);
$routes->post('AdminDashboard/guardaJugador', 'AdminDashboard::guardaJugador', ['filter' => 'SesionAdmin:administrador']);
$routes->post('AdminDashboard/guardaUsuario', 'AdminDashboard::guardaUsuario', ['filter' => 'SesionAdmin:administrador']);
$routes->post('AdminDashboard/guardaEquipo', 'AdminDashboard::guardaEquipo', ['filter' => 'SesionAdmin:administrador']);
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

//para todas estas vistas se debe modificar el archivo view ya que extiende el formato desde 
//el sidebar socio, deben colocar que extienda desde el sidebardireccion o como se llame
//también deben agregar el tema de que la sesión esté activa


//esta vista contiene ingreso por sponsor o actividades especiales, debe estar en un botón en direccion



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
