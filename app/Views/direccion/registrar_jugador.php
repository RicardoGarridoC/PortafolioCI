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
<h2>Registro de jugador</h2>
<?= form_open('CompraJugadorController/registrarJugador'); ?>
  <div class="form-group">
    <?= form_label('Posición', 'posicion') ?>
    <?= form_input('posicion', '', ['class' => 'form-control', 'required' => 'required', 'pattern' => '[A-Za-z\s]+']) ?>
  </div>
  <div class="form-group">
    <?= form_label('Tipo', 'tipo') ?>
    <?= form_dropdown('tipo', ['Sueldo' => 'Sueldo', 'Ayuda economica' => 'Ayuda económica'], '', ['class' => 'form-control']) ?>
  </div>
  <div class="form-group">
    <?= form_label('Monto', 'monto') ?>
    <?= form_input(['type' => 'number', 'name' => 'monto', 'class' => 'form-control', 'required' => 'required']) ?>
  </div>
  <div class="form-group">
    <?= form_label('Número de la camiseta', 'numero_camiseta') ?>
    <?= form_input(['type' => 'number', 'name' => 'numero_camiseta', 'class' => 'form-control', 'required' => 'required']) ?>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Registrar jugador</button>
<?= form_close(); ?>

<?= $this->endSection() ?>
