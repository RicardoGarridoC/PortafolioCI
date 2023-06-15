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
    <h1><?= esc($title); ?></h1>
    <?= \Config\Services::validation()->listErrors(); ?>

    <form action="<?= base_url('RegistrarJugadorController/registrar') ?>" method="post">
        <div class="form-group">
        <label for="genero">Género:</label>
            <select id="genero" name="genero" class="form-control">
                <option value="">Seleccione el género</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo de Jugador:</label>
            <select id="tipo" name="tipo" class="form-control">
                <option value="">Seleccione el tipo de jugador</option>
                <option value="profesional">Profesional</option>
                <option value="aficionado">Aficionado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="posicion">Posición:</label>
            <input type="text" class="form-control" id="posicion" name="posicion" required>
        </div>

        <div class="form-group">
            <label for="monto">Sueldo o Ayuda economica:</label>
            <input type="text" class="form-control" id="monto" name="monto" required>
        </div>

        <div class="form-group">
            <label for="equipo_origen">Equipo origen:</label>
            <select id="equipo_origen" name="equipo_origen" class="form-control">
                <!-- Los equipos origen se cargarán aquí mediante AJAX -->
            </select>
        </div>

        <div class="form-group">
            <label for="numero_camiseta">Numero de camiseta:</label>
            <input type="text" class="form-control" id="numero_camiseta" name="numero_camiseta" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <script>
    $(document).ready(function(){
        $('#genero').change(function(){
            var genero = $(this).val();
            $.ajax({
                url: '<?= base_url('RegistrarJugadorController/obtenerEquiposPorGenero/') ?>' + genero,
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




