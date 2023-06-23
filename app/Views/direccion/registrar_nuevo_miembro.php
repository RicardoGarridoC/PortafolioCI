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

    <form action="<?= base_url('RegistrarEquipoTecnicoController/registrar') ?>" method="post">
        <div class="form-group">
            <label for="cargo">Cargo:</label>
            <select name="cargo" id="cargo" class="form-control" required>
                <option value="entrenador">Entrenador</option>
                <option value="asistente_entrenador">Asistente del entrenador</option>
                <option value="preparador_fisico">Preparador físico</option>
                <option value="utilero">Utilero</option>
                <option value="kinesiologo">Kinesiólogo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="equipo_origen">Equipo origen:</label>
            <select id="equipo_origen" name="equipo_origen" class="form-control">
                <!-- Los equipos origen se cargarán aquí mediante AJAX -->
            </select>
        </div>

        <div class="form-group">
            <label for="sueldo">Sueldo:</label>
            <input type="number" class="form-control" id="sueldo" name="sueldo" required>
        </div>

        <div class="form-group">
            <label for="valor_hora_extra">Valor de hora extra:</label>
            <input type="number" class="form-control" id="valor_hora_extra" name="valor_hora_extra" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <script>
    $(document).ready(function(){
        $.ajax({
            url: '<?= base_url('RegistrarEquipoTecnicoController/obtenerEquipos/') ?>',
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
    </script>
</body>
</html>
<?= $this->endSection() ?>
