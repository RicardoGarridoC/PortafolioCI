<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sponsors</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                    <li class="breadcrumb-item active">Sponsors</li>
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
                <h5 class="modal-title" id="exampleModalLabel">Agregar Sponsor</h5>
                <button type="button" class="fa fa-times" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('AdminDashboard/guardaSponsor', 'id="myForm"'); ?>

                <div class="form-group">
                    <?php

                    echo form_label('Nombre', 'nombre');
                    echo form_input(array('name' => 'nombre', 'placeholder' => 'Nombre', 'class' => 'form-control', 'required' => 'required'));
                    echo "<br>";

                    echo form_label('Monto por Partido', 'monto_por_partido');
                    echo form_input(array('name' => 'monto_por_partido', 'placeholder' => 'Monto por Partido', 'class' => 'form-control', 'required' => 'required'));
                    echo "<br>";

                    echo form_label('Condiciones', 'condiciones');
                    echo form_input(array('name' => 'condiciones', 'placeholder' => 'Condiciones', 'class' => 'form-control', 'required' => 'required'));
                    echo "<br>";
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_submit('guardaSponsor', 'Guardar', 'class="btn btn-primary"'); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<?php foreach ($sponsors as $sponsor) : ?>
    <div class="modal fade" id="editModal<?= $sponsor['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Sponsor</h5>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaSponsor'); ?>

                    <div class="form-group">
                        <?php

                        echo form_label('Nombre', 'nombre');
                        echo form_input(array('name' => 'nombre', 'placeholder' => 'Nombre', 'class' => 'form-control', 'value' => $sponsor['nombre'], 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Monto por Partido', 'monto_por_partido');
                        echo form_input(array('name' => 'monto_por_partido', 'placeholder' => 'Monto por Partido', 'class' => 'form-control', 'value' => $sponsor['monto_por_partido'], 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Condiciones', 'condiciones');
                        echo form_input(array('name' => 'condiciones', 'placeholder' => 'Condiciones', 'class' => 'form-control', 'value' => $sponsor['condiciones'], 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo form_submit('guardaSponsor', 'Guardar', 'class="btn btn-primary"');
                    echo form_hidden('id', $sponsor['id']);
                    ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                <?php echo form_close(); ?>
            </div> 
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Eliminar -->
<?php foreach ($sponsors as $sponsor) : ?>
    <div class="modal fade" id="deleteModal<?= $sponsor['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar Sponsor</h5>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres eliminar este sponsor?</p>
                </div>
                <div class="modal-footer">
                    <?php echo form_open('AdminDashboard/borrarSponsor'); ?>
                    <?php echo form_hidden('id', $sponsor['id']); ?>
                    <?php echo form_submit('borrarSponsor', 'Eliminar', 'class="btn btn-danger"'); ?>
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
                        <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Sponsor</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Monto por Partido</th>
                                    <th scope="col">Condiciones</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sponsors as $sponsor) : ?>
                                    <tr>
                                        <td><?= $sponsor['id'] ?></td>
                                        <td><?= $sponsor['nombre'] ?></td>
                                        <td><?= $sponsor['monto_por_partido'] ?></td>
                                        <td><?= $sponsor['condiciones'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $sponsor['id'] ?>">Editar</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $sponsor['id'] ?>">Eliminar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Monto por Partido</th>
                                    <th scope="col">Condiciones</th>
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
