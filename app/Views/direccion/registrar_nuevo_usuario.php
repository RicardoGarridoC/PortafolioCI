<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title); ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1><?= esc($title); ?></h1>
    <?= \Config\Services::validation()->listErrors(); ?>

    <form action="<?= base_url('RegistrarJugadorController/registrarUsuario') ?>" method="post">
        <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" class="form-control" id="nombres" name="nombres">
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="run">RUN:</label>
            <input type="text" class="form-control" id="run" name="run">
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <textarea class="form-control" id="direccion" name="direccion"></textarea>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>

        <input type="hidden" name="jugador_id" value="<?= session()->get('jugador_id') ?>">

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</body>
</html>
<?= $this->endSection() ?>

