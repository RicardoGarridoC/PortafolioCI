<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session('success') ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<script>
setTimeout(function() {
    $('.alert').alert('close');
}, 2000);
</script>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?= session('error') ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<script>
setTimeout(function() {
    $('.alert').alert('close');
}, 2000);
</script>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title); ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Agregar Resultado</h1>
        <?= \Config\Services::validation()->listErrors(); ?>

        <form action="<?= base_url('AdminDashboard/campeonatoHome') ?>" method="post">
            <div class="form-group">
                <label for="equipo_destino">Elegir Partido</label>
                <select id="equipo_destino" name="equipo_destino" class="form-control">
                    <option value="">Seleccione el partido</option>
                    <?php foreach ($partidosLibres as $partidoLibre) : ?>
                        <option value="<?= $partidoLibre['id'] ?>" data-idd="<?= $partidoLibre['id'] ?>">
                            <?= $partidoLibre['id'] ?> (<?= $partidoLibre['equipo_local'] ?> VS <?= $partidoLibre['equipo_visita'] ?>)
                        </option>
                    <?php endforeach; ?>
                    <option value="no_aplica">No Aplica</option>
                </select>
            </div>

            <div class="form-group">
                <label for="equipo_local">Equipo Local:</label>
                <select id="equipo_local" name="equipo_local" class="form-control">
                    <!-- El equipo local se cargara aquí mediante AJAX (Si es que fue seleccionado un partido (diferente a no aplica)) -->
                </select>
            </div>
            <div class="form-group">
                <label for="equipo_visita">Equipo Visita:</label>
                <select id="equipo_visita" name="equipo_visita" class="form-control">
                    <!-- El equipo visita se cargara aquí mediante AJAX (Si es que fue seleccionado un partido (diferente a no aplica))  -->
                </select>
            </div>

            <div class="form-group">
                <label for="goleslocal">Goles Local:</label>
                <input type="number" class="form-control" id="goleslocal" name="goleslocal">
            </div>

            <div class="form-group">
                <label for="golesvisita">Goles Visita:</label>
                <input type="number" class="form-control" id="golesvisita" name="golesvisita">
            </div>

            <div class="form-group">
                <label for="tipopartido">Categoria Partido:</label>
                <select id="tipopartido" name="tipopartido" class="form-control">
                    <!-- La categoria dependera del partido por AJAX-->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Resultado</button>
        </form>
    </div>

    
    <script>
        $(document).ready(function(){
            $('#equipo_destino').change(function(){
                var idd = $(this).val();
                
                if (idd === "no_aplica") {
                    // Si se selecciona "No Aplica", habilitar los campos de equipo local y visita
                    $('#equipo_local').prop('disabled', false);
                    $('#equipo_visita').prop('disabled', false);
                    $('#tipopartido').prop('disabled', false); 

                    $.ajax({
                        url: '<?= base_url('AdminDashboard/obtenerEquiposLocalVisita/no_aplica') ?>',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            var $equipoLocal = $('#equipo_local');
                            $equipoLocal.empty();
                            $equipoLocal.append('<option value="">Seleccione el equipo local</option>');
                            $.each(response.equipos, function(index, equipo) {
                                $equipoLocal.append('<option value="' + equipo.id + '">' + equipo.nombre + '</option>');
                            });

                            var $equipoVisita = $('#equipo_visita');
                            $equipoVisita.empty();
                            $equipoVisita.append('<option value="">Seleccione el equipo visita</option>');
                            $.each(response.equipos, function(index, equipo) {
                                $equipoVisita.append('<option value="' + equipo.id + '">' + equipo.nombre + '</option>');
                            });

                            var $categoriaCampeonato = $('#tipopartido');
                            $categoriaCampeonato.empty();
                            $categoriaCampeonato.append('<option value="">Seleccione la categoría</option>');
                            $.each(response.categorias, function(index, categoria) {
                                $categoriaCampeonato.append('<option value="' + categoria.id + '">' + categoria.nombre + '</option>');
                            });
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });

                } else {
                    // Si se un partido, realizar la llamada AJAX y deshabilitar los campos de equipo local y visita
                    $.ajax({
                        url: '<?= base_url('AdminDashboard/obtenerEquiposLocalVisita/') ?>' + idd,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            var $equipoLocal = $('#equipo_local');
                            $equipoLocal.empty();
                            $.each(response, function(index, equipo) {
                                $equipoLocal.append('<option value="' + equipo.id_local + '">' + equipo.equipo_local + '</option>');
                            });
                            //$equipoLocal.prop('disabled', true); // Bloquear el campo equipo_local

                            var $equipoVisita = $('#equipo_visita');
                            $equipoVisita.empty();
                            $.each(response, function(index, equipo) {
                                $equipoVisita.append('<option value="' + equipo.id_visita + '">' + equipo.equipo_visita + '</option>');
                            });
                            //$equipoVisita.prop('disabled', true); // Bloquear el campo equipo_visita

                            var $categoriaCampeonato = $('#tipopartido');
                            $categoriaCampeonato.empty();
                            $.each(response, function(index, equipo) {
                                $categoriaCampeonato.append('<option value="' + equipo.categoriaid + '">' + equipo.nombrecategoria + '</option>');
                            });
                            //$categoriaCampeonato.prop('disabled', true); // Deshabilitar el campo de categoría campeonato

                            // Habilitar nuevamente el equipo seleccionado en el formulario de equipo visita
                            //var equipoLocalSeleccionado = $equipoLocal.val();
                            //$equipoVisita.find('option[value="' + equipoLocalSeleccionado + '"]').prop('disabled', false);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>


<?= $this->endSection() ?>