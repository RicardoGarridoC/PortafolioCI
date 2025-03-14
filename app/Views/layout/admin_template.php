
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/summernote/summernote-bs4.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>/public/images/losalces.png" alt="AdminLTELogo" height="150" width="150">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="AdminDashboard" class="brand-link">
      <img src="<?= base_url() ?>/public/images/losalces.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Los Alces</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="dropdown pb-4">
          <a href="#" class="user-panel mt-3 pb-3 mb-3 d-flex dropdown-toggle" id="dropdownUser1" data-toggle="dropdown" aria-expanded="false">
            <div class="image">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png" alt="hugenerd" width="30" height="30" class="img-circle elevation-2">
            </div>  
              <span class="d-block info d-none d-sm-inline mx-1"><?= session('nombreUsuario') ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow bg-dark">
              <!--<li><a class="dropdown-item" href="#">New project...</a></li>-->
              <li><a class="dropdown-item" href="<?php echo base_url('PerfilAdmin')?>">Ver Perfil</a></li>
              <li>
                  <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" onclick="cerrarSesion()">Cerrar Sesión</a></li>
          </ul>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('PartidoHomeAdmin')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ultimos partidos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('CampeonatoHomeAdmin')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar resultados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('PartidoEnVivo')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partido en vivo</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tablas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('AdminCambioDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cambios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('AdminCambioExternoDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cambios Externos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('AdminCampeonatoDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Campeonatos</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminCanchaDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Canchas</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminDirectorDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sueldo Dirigente</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminDivisionDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Divisiones</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminEgresoDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Egresos</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('AdminEquipoDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Equipos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('AdminEquipoTecnicoDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Equipo Técnico</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminGolesDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Goles</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminIngresoDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Ingresos</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('AdminJugadorDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jugadores</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminLesionesDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lesiones</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminMotivoDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Motivos</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminPagoSocioDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pagos de Socios</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminPartidoDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Partidos</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('AdminResultadoDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resultados</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('AdminSocioDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Socios</p>
                </a>
              </li>
              
              <li class="nav-item">
                  <a href="<?php echo base_url('AdminSouvenirDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Souvenirs</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminSponsorDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sponsors</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminTarjetaPartidoDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tarjetas de Partidos</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo base_url('AdminTraspasoDt')?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Traspasos</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('AdminUsuarioDt')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $this->renderSection('content'); ?>
  </div>
  <!-- /.content-wrapper -->


  <footer class="text-center text-black">
        <div class="container pt-4">
            <!-- Social media -->
            <section class="mb-4">
            <p><strong>Copyright &copy; 2023 <a href="#">Los Alces FC</a>.</strong> Todos los derechos reservados.</p>
            <p>Developed by DevGroup DAF devgroupdaf@contacto.com</p>
            </section>
        </div>

    </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/public/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>/public/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>/public/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>/public/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/public/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/public/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="<?= base_url() ?>/public/dist/js/demo.js"></script>
 AdminLTE dashboard demo (This is only for demo purposes) 
<script src="<?= base_url() ?>/public/dist/js/pages/dashboard.js"></script>-->
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
  $("#example1").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); 

  $(document).ready(function() {
        $('#agregarModal').on('hidden.bs.modal', function() {
            $('#myForm')[0].reset();
        });
    });
</script>

<script type="text/javascript">
    function cerrarSesion() {
        window.location.href = "<?php echo base_url('Home/cerrarSesion'); ?>";
    }
</script>

</body>
</html>
