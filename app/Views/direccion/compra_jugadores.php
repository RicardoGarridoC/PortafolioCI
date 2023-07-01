<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>
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
    <h1>Compra de jugadores</h1>
    <?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
        <?php foreach(session('error') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('CompraJugadorController/index') ?>" method="post" id="registro-form">
        <div class="form-group">
            <label for="equipo_destino">Equipo destino:</label>
            <select id="equipo_destino" name="equipo_destino" class="form-control">
                <option value="">Seleccione el equipo destino</option>
                <?php foreach ($equiposDestino as $equipo) : ?>
                    <option value="<?= $equipo['id'] ?>" data-genero="<?= $equipo['genero'] ?>"><?= $equipo['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="equipo_origen">Equipo origen:</label>
            <select id="equipo_origen" name="equipo_origen" class="form-control">
                <!-- Los equipos origen se cargarán aquí mediante AJAX -->
            </select>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombres" name="nombres">
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos">
        </div>

        <div class="form-group">
            <label for="monto">Monto:</label>
            <input type="number" class="form-control" id="monto" name="monto">
        </div>

        <button type="submit" class="btn btn-primary" id="btn-registrar">Registrar</button>
    </form>

    <script>
    $(document).ready(function(){
        $('#registro-form').submit(function(event) {
            var equipoDestino = $('#equipo_destino').val();
            var equipoOrigen = $('#equipo_origen').val();
            var nombres = $('#nombres').val();
            var apellidos = $('#apellidos').val();
            var monto = $('#monto').val();

            if (equipoDestino === '') {
                event.preventDefault();
                alert('Debe seleccionar un equipo destino.');
            } else if (equipoOrigen === '') {
                event.preventDefault();
                alert('Debe seleccionar un equipo origen.');
            } else if (nombres === '') {
                event.preventDefault();
                alert('Debe ingresar un nombre.');
            } else if (apellidos === '') {
                event.preventDefault();
                alert('Debe ingresar un apellido.');
            } else if (monto === '') {
                event.preventDefault();
                alert('Debe ingresar un monto.');
            }
        });

        $('#equipo_destino').change(function(){
            var genero = $(this).find(':selected').data('genero');
            $.ajax({
                url: '<?= base_url('CompraJugadorController/obtenerEquiposOrigen/') ?>' + genero,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var $equipo_origen = $('#equipo_origen');
                    $equipo_origen.empty();
                    $equipo_origen.append('<option value="">Seleccione el equipo origen</option>');
                    $.each(response, function(index, equipo) {
                        $equipo_origen.append('<option value="' + equipo.id + '">' + equipo.nombre + '</option>');
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
