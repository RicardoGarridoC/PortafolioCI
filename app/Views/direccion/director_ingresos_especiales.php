<?= $this->extend('layout/direccion_template') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ingresos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                    <li class="breadcrumb-item active">Ingresos Especiales</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Añadir -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar ingreso especial</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('DireccionDashboard/ingresosEspeciales', 'id="myForm"'); ?>

                <div class="form-group">
                    <?php

                    echo form_label('monto', 'monto');
                    echo form_input(array('number' => 'monto', 'placeholder' => 'monto', 'class' => 'form-control', 'required' => 'required'));
                    echo "<br>";


                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_submit('DireccionDashboard/ingresosEspeciales', 'Guardar', 'class="btn btn-primary"'); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>




</section>
<!-- /.content -->

<?= $this->endSection() ?>