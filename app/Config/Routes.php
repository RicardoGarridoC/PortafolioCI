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
$routes->get('VerJugadores', 'SocioController::mostrarJugador2', ['filter' => 'SesionSocio']);
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

$routes->get('AdminResultadoDt', 'AdminDashboard::resultadoDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminCambioDt', 'AdminDashboard::cambioDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminCambioExternoDt', 'AdminDashboard::cambioexternoDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminCampeonatoDt', 'AdminDashboard::campeonatoDatabase', ['filter' => 'SesionAdmin']);

$routes->get('AdminCanchaDt', 'AdminDashboard::canchaDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminDirectorDt', 'AdminDashboard::dirigenteDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminDivisionDt', 'AdminDashboard::divisionDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminEgresoDt', 'AdminDashboard::egresosDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminGolesDt', 'AdminDashboard::golesDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminIngresoDt', 'AdminDashboard::ingresosDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminLesionesDt', 'AdminDashboard::lesionesDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminMotivoDt', 'AdminDashboard::motivosDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminPagoSocioDt', 'AdminDashboard::pagosociosDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminPartidoDt', 'AdminDashboard::partidosDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminSouvenirDt', 'AdminDashboard::souvenirsDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminSponsorDt', 'AdminDashboard::sponsorsDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminTarjetaPartidoDt', 'AdminDashboard::tarjetaspartidosDatabase', ['filter' => 'SesionAdmin']);
$routes->get('AdminTraspasoDt', 'AdminDashboard::traspasosDatabase', ['filter' => 'SesionAdmin']);

$routes->get('PerfilAdmin', 'AdminDashboard::verAdminUsuario', ['filter' => 'SesionAdmin']);
$routes->get('EditarUsuarioAdmin', 'AdminDashboard::guardaAdminUsuario', ['filter' => 'SesionAdmin']);
$routes->post('EditarUsuarioAdmin', 'AdminDashboard::guardaAdminUsuario', ['filter' => 'SesionAdmin']);
$routes->get('PartidoHomeAdmin', 'AdminDashboard::partidoHome', ['filter' => 'SesionAdmin']);
$routes->get('CampeonatoHomeAdmin', 'AdminDashboard::campeonatoHome', ['filter' => 'SesionAdmin']);
$routes->post('CampeonatoHomeAdmin', 'AdminDashboard::campeonatoHome', ['filter' => 'SesionAdmin']);
//
$routes->get('PartidoEnVivo', 'PartidoEnVivoController::index', ['filter' => 'SesionAdmin']);

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
$routes->get('JugadoresDireccion', 'DireccionDashboard::direccionverJugadores2', ['filter' => 'SesionDirector']);
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
$routes->get('RegistrarEquipoTecnicoController/obtenerEquipos/(:segment)', 'RegistrarEquipoTecnicoController::obtenerEquipos/$1' , ['filter' => 'SesionDirector']);
$routes->post('RegistrarEquipoTecnicoController/registrarUsuarioEquipoTecnico', 'RegistrarEquipoTecnicoController::registrarUsuarioEquipoTecnico' , ['filter' => 'SesionDirector']);
//Rutas Jugador
$routes->get('InicioJugador', 'JugadorController::Dashboard', ['filter' => 'SesionJugador']);
$routes->get('JugadoresJugador', 'JugadorController::jugadorverJugadores2', ['filter' => 'SesionJugador']);
$routes->get('CampeonatosJugador', 'JugadorController::jugadorverCampeonatos', ['filter' => 'SesionJugador']);
$routes->get('PartidosJugador', 'JugadorController::verPartidos', ['filter' => 'SesionJugador']);
$routes->get('EstadisticasJugador', 'JugadorController::jugadorverEstadisticas', ['filter' => 'SesionJugador']);
$routes->get('EquipoTecnicoJugador', 'JugadorController::jugadorverEquipoTecnico', ['filter' => 'SesionJugador']);
$routes->get('PerfilJugador', 'JugadorController::verJugadorUsuario', ['filter' => 'SesionJugador']);
$routes->get('EditarUsuarioJugador', 'JugadorController::guardaJugadorUsuario', ['filter' => 'SesionJugador']);
$routes->post('EditarUsuarioJugador', 'JugadorController::guardaJugadorUsuario', ['filter' => 'SesionJugador']);
//Rutas Equipo Tecnico
$routes->get('InicioEquipoTecnico', 'EquipoTecnicoController::Dashboard', ['filter' => 'SesionEquipoTecnico']);
$routes->get('JugadoresEquipoTecnico', 'EquipoTecnicoController::equipotecnicoverJugadores2', ['filter' => 'SesionEquipoTecnico']);
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
$routes->post('AdminDashboard/guardaResultado', 'AdminDashboard::guardaResultado', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarResultado', 'AdminDashboard::borrarResultado', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaCambio', 'AdminDashboard::guardaCambio', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarCambio', 'AdminDashboard::borrarCambio', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaCambioExterno', 'AdminDashboard::guardaCambioExterno', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarCambioExterno', 'AdminDashboard::borrarCambioExterno', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaCancha', 'AdminDashboard::guardaCancha', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarCancha', 'AdminDashboard::borrarCancha', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaDirigente', 'AdminDashboard::guardaDirigente', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarDirigente', 'AdminDashboard::borrarDirigente', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaDivision', 'AdminDashboard::guardaDivision', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarDivision', 'AdminDashboard::borrarDivision', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaEgreso', 'AdminDashboard::guardaEgreso', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarEgreso', 'AdminDashboard::borrarEgreso', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaGol', 'AdminDashboard::guardaGol', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarGol', 'AdminDashboard::borrarGol', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaIngreso', 'AdminDashboard::guardaIngreso', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarIngreso', 'AdminDashboard::borrarIngreso', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaLesion', 'AdminDashboard::guardaLesion', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarLesion', 'AdminDashboard::borrarLesion', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaMotivo', 'AdminDashboard::guardaMotivo', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarMotivo', 'AdminDashboard::borrarMotivo', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaPagoSocio', 'AdminDashboard::guardaPagoSocio', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarPagoSocio', 'AdminDashboard::borrarPagoSocio', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaPartido', 'AdminDashboard::guardaPartido', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarPartido', 'AdminDashboard::borrarPartido', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaSouvenir', 'AdminDashboard::guardaSouvenir', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarSouvenir', 'AdminDashboard::borrarSouvenir', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaSponsor', 'AdminDashboard::guardaSponsor', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarSponsor', 'AdminDashboard::borrarSponsor', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaTarjetaPartido', 'AdminDashboard::guardaTarjetaPartido', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarTarjetaPartido', 'AdminDashboard::borrarTarjetaPartido', ['filter' => 'SesionAdmin']);
$routes->post('AdminDashboard/guardaTraspaso', 'AdminDashboard::guardaTraspaso', ['filter' => 'SesionAdmin']);
$routes->get('AdminDashboard/borrarTraspaso', 'AdminDashboard::borrarTraspaso', ['filter' => 'SesionAdmin']);

//Rutas Aplicacion Movil
//login
$routes->post('Home/validarIngresoMovil', 'Home::validarIngresoMovil');
//dashboard Movil
$routes->get('ReporteEstadisticasMovil', 'SocioController::getReporteEstadisticasMovil');
//Cerrar sesion Movil
$routes->get('/logoutM', 'Home::cerrarSesionMovil');

//nuevas rutas venta souvenirs
$routes->get('TiendaOficial', 'VentaSouvenirsController::cargaArticulos');
$routes->get('DetalleProducto', 'VentaSouvenirsController::detalleProducto');
$routes->get('CarroCompras', 'VentaSouvenirsController::mostrarCarro');
$routes->get('Checkout', 'VentaSouvenirsController::checkout');
$routes->get('VentaEntradas', 'VentaSouvenirsController::loadVentaEntradas');
$routes->get('DatosComprador', 'VentaSouvenirsController::datosComprador');
$routes->post('VentaEntradasController/confirmarCompraEntrada', 'VentaEntradasController::confirmarCompraEntrada');
$route['VentaSouvenirsController/datosComprador/(:num)'] = 'VentaSouvenirsController/datosComprador/$1';

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
