<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>
<?php echo form_open('AgregarSponsor'); ?>
  <div class="form-group">
    <?php
    echo form_label('Nombre', 'nombre');
    echo form_input(array('name' => 'nombre', 'placeholder' => 'Ingrese el nombre del sponsor', 'class' => 'form-control', 'pattern' => '[^\d]+', 'required' => 'required'));
    ?>
  </div>
  <div class="form-group">
    <?php
    echo form_label('Monto por partido', 'monto_por_partido');
    echo form_input(array('name' => 'monto_por_partido', 'placeholder' => 'Ingrese el monto', 'class' => 'form-control', 'pattern' => '[0-9]{1,}', 'required' => 'required'));
    ?>
  </div>
  <div class="form-group">
    <?php
    echo form_label('Condiciones', 'condiciones');
    echo form_input(array('name' => 'condiciones', 'placeholder' => 'Ingrese las condiciones', 'class' => 'form-control', 'pattern' => '[^\d]+', 'required' => 'required'));
    ?>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Registrar sponsor</button>
<?php echo form_close(); ?>
<?= $this->endSection() ?>
