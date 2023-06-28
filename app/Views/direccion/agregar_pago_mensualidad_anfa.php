<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>

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

<h2>Pago de mensualidad ANFA</h2>
<form action="<?= base_url('EgresoController/pagarMensualidadAnfa') ?>" method="post">
    <div class="form-group">
        <label for="valor_utm">Valor UTM</label>
        <input type="text" class="form-control" id="valor_utm" value="<?= $utm->valor_utm ?>" readonly>
    </div>

    <div class="form-group">
        <label for="total_a_pagar">Total a Pagar</label>
        <input type="text" class="form-control" id="total_a_pagar" value="<?= $utm->total_a_pagar ?>" readonly>
    </div>

    <button type="submit" class="btn btn-primary">Pagar Mensualidad</button>
</form>

<?= $this->endSection() ?>
