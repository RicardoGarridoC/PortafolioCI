<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Divisiones</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                    <li class="breadcrumb-item active">Divisiones</li>
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
                <h5 class="modal-title" id="exampleModalLabel">Agregar División</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('AdminDashboard/guardaDivision', 'id="myForm"'); ?>

                <div class="form-group">
                    <?php

                    echo form_label('Categoría', 'categoria');
                    echo form_input(array('name' => 'categoria', 'placeholder' => 'Categoría', 'class' => 'form-control', 'required' => 'required'));
                    echo "<br>";
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_submit('guardaDivision', 'Guardar', 'class="btn btn-primary"'); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<?php foreach ($divisiones as $division) : ?>
    <div class="modal fade" id="editModal<?= $division['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar División</h5>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaDivision'); ?>

                    <div class="form-group">
                        <?php

                        echo form_label('Categoría', 'categoria');
                        echo form_input(array('name' => 'categoria', 'placeholder' => 'Categoría', 'class' => 'form-control', 'value' => $division['categoria'], 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo form_submit('guardaDivision', 'Guardar', 'class="btn btn-primary"');
                    echo form_hidden('id', $division['id']);
                    ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Eliminar -->
<?php foreach ($divisiones as $division) : ?>
    <div class="modal fade" id="deleteModal<?= $division['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar División</h5>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres eliminar esta división?</p>
                </div>
                <div class="modal-footer">
                    <?php echo form_open('AdminDashboard/eliminaDivision'); ?>
                    <?php echo form_hidden('id', $division['id']); ?>
                    <?php echo form_submit('eliminaDivision', 'Eliminar', 'class="btn btn-danger"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir División</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($divisiones as $division) : ?>
                                    <tr>
                                        <td><?= $division['id'] ?></td>
                                        <td><?= $division['categoria'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $division['id'] ?>">Editar</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $division['id'] ?>">Eliminar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection() ?>
