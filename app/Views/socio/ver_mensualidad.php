<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

<div class="form-group">
    <?php
    echo form_label('Fecha', 'fecha', ['class' => 'form-label']);
    echo '<p class="form-control">' . date('Y-m-d') . '</p>';
    ?>
</div>

<div class="form-group">
    <?php
    echo form_label('Monto a Pagar', 'monto_a_pagar', ['class' => 'form-label']);
    echo '<p class="form-control">' . $monto_a_pagar . '</p>';
    ?>
</div>

<div class="form-group">
    <?php
    echo form_label('Descripción', 'descripcion', ['class' => 'form-label']);
    echo '<p class="form-control">Pago de Mensualidad</p>';
    ?>
</div>
<br>
<?php echo form_open('VerMensualidad'); ?>
  <button type="submit" class="btn btn-primary btn-block">Pagar Mensualidad</button>
<?php echo form_close(); ?>

<br>
<?php if (isset($mensaje)) : ?>
    <div class="mensaje text-warning bg-dark"><?php echo $mensaje; ?></div>
<?php endif; ?>


<?= $this->endSection() ?>