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

<h2>Registro de usuario</h2>

<form method="post" action="<?= base_url('CompraJugadorController/registrarUsuario') ?>">
    <div class="form-group">
        <label>Email del Jugador</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label>RUT del Jugador (sin puntos y con guion)</label>
        <input type="text" name="run" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Contraseña por defecto</label>
        <input type="text" name="password" class="form-control" value="123456" readonly>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Registrar usuario</button>
</form>

<?= $this->endSection() ?>
