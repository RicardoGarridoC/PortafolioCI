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
                        <option value="<?= $partidoLibre['id'] ?>"><?= $partidoLibre['id'] ?></option>
                    <?php endforeach; ?>
                    <option value="">No Aplica</option>
                </select>
            </div>

            <div class="form-group">
                <label for="equipo_local">Equipo Local:</label>
                <select id="equipo_local" name="equipo_local" class="form-control">
                    <!-- Los equipos se cargarán aquí mediante AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="equipo_visita">Equipo Visita:</label>
                <select id="equipo_visita" name="equipo_visita" class="form-control">
                    <!-- Los equipos se cargarán aquí mediante AJAX -->
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
                    <!-- <?php foreach ($partidosLibres as $partidoLibre) : ?>
                        <option value="<?= $partidoLibre['id'] ?>"><?= $partidoLibre['id'] ?></option>
                    <?php endforeach; ?> -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script>
    $(document).ready(function(){
        $('#equipo_destino').change(function(){
            var genero = $(this).find(':selected').data('genero');
            $.ajax({
                url: '<?= base_url('AdminDashboard/obtenerEquiposLocalVisita/') ?>' + genero,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var $equipoLocal = $('#equipo_local');
                    $equipoLocal.empty();
                    $equipoLocal.append('<option value="">Seleccione el equipo origen</option>');
                    $.each(response, function(index, equipo) {
                        $equipoLocal.append('<option value="' + equipo.id + '">' + equipo.nombre + '</option>');
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
    </script>

<?= $this->endSection() ?>