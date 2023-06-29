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
            <label for="equipo_origen">Equipo de origen:</label>
            <select name="equipo_origen" id="equipo_origen" class="form-control" required>
                <option value="null">No aplica</option>
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
            url: '<url_del_endpoint>',
            type: 'GET',
            success: function(data){
                var equipos = JSON.parse(data);
                equipos.forEach(function(equipo){
                    if (equipo.id !== 10 && equipo.id !== 14) {
                        $('#equipo_origen').append('<option value="' + equipo.id + '">' + equipo.nombre + '</option>');
                    }
                });
            },
            error: function(){
                console.log("No se ha podido obtener la información");
            }
        });
    });
    </script>

</body>
</html>
<?= $this->endSection() ?>
