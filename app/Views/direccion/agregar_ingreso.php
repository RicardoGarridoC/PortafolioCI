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

<?php echo form_open('IngresoController/registrar'); ?>
  <div class="form-group">
    <?php
    echo form_label('Concepto', 'concepto');
    echo form_dropdown('concepto', ['---','sponsor' => 'Sponsor', 'actividades_extra' => 'Actividades Extraordinarias'], '', ['class' => 'form-control', 'id' => 'concepto']);
    ?>
  </div>
  <div class="form-group" id="sponsors" style="display: none;">
    <?php
    echo form_label('Sponsor', 'sponsor_id');
    echo form_dropdown('sponsor_id', $sponsorNames, '', ['class' => 'form-control', 'id' => 'sponsor_id']);
    ?>
  </div>
  <div class="form-group" id="monto" style="display: none;">
    <?php
    echo form_label('Monto', 'monto');
    echo form_input(array('name' => 'monto', 'placeholder' => 'Ingrese el monto', 'class' => 'form-control', 'readonly' => 'true', 'id' => 'montoInput', 'value' => ''));
    ?>
  </div>
  <div class="form-group" id="actividades_monto" style="display: none;">
    <?php
    echo form_label('Monto', 'monto');
    echo form_input(array('name' => 'monto', 'placeholder' => 'Ingrese el monto', 'class' => 'form-control', 'value' => ''));
    ?>
  </div>
  <div class="form-group" id="actividades_detalle" style="display: none;">
    <?php
    echo form_label('Detalle de actividad', 'detalle');
    echo form_input(array('name' => 'detalle', 'placeholder' => 'Ingrese detalle de actividad', 'class' => 'form-control', 'value' => ''));
    ?>
  </div>
  <div class="form-group">
    <?php
    echo form_label('Fecha', 'fecha');
    echo form_input(array('type' => 'date', 'name' => 'fecha', 'class' => 'form-control', 'required' => 'required'));
    ?>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Registrar ingreso</button>
<?php echo form_close(); ?>

<script>
  const Select = document.getElementById('concepto');
  const SponsorContainer = document.getElementById('sponsors');
  const MontoContainer = document.getElementById('monto');
  const ActividadesMontoContainer = document.getElementById('actividades_monto');
  const ActividadesDetalleContainer = document.getElementById('actividades_detalle');
  const montoInput = document.getElementById('montoInput');
  const sponsorAmounts = <?php echo json_encode($sponsorAmounts); ?>;
  const montosActividades = <?php echo 0; ?>;

  Select.addEventListener('change', (event) => {
    if(event.target.value === 'sponsor') {
      SponsorContainer.style.display = 'block';
      MontoContainer.style.display = 'block';
      ActividadesMontoContainer.style.display = 'none';
      ActividadesDetalleContainer.style.display = 'none';
      montoInput.value = sponsorAmounts[document.getElementById('sponsor_id').value];
    } else if (event.target.value === 'actividades_extra') {
      SponsorContainer.style.display = 'none';
      MontoContainer.style.display = 'none';
      ActividadesMontoContainer.style.display = 'block';
      ActividadesDetalleContainer.style.display = 'block';
    } else {
      SponsorContainer.style.display = 'none';
      MontoContainer.style.display = 'none';
      ActividadesMontoContainer.style.display = 'none';
      ActividadesDetalleContainer.style.display = 'none';
    }
  });

  const SponsorSelect = document.getElementById('sponsor_id');

  SponsorSelect.addEventListener('change', (event) => {
    montoInput.value = sponsorAmounts[event.target.value];
  });
</script>

<?= $this->endSection() ?>





