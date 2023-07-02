<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lesiones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                        <li class="breadcrumb-item active">Lesiones</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Lesión</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaLesion', 'id="myForm"'); ?>

                    <div class="form-group">
                        <?php

                        echo form_label('Fecha de inicio', 'fecha_inicio_lesion');
                        echo form_input(array('name' => 'fecha_inicio_lesion', 'placeholder' => 'Fecha de inicio', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Fecha de fin', 'fecha_fin_lesion');
                        echo form_input(array('name' => 'fecha_fin_lesion', 'placeholder' => 'Fecha de fin', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('ID Jugador', 'jugador_id_fk');
                        echo form_input(array('name' => 'jugador_id_fk', 'placeholder' => 'ID Jugador', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo form_submit('guardaLesion', 'Guardar', 'class="btn btn-primary"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <?php foreach ($lesiones as $lesion) : ?>
        <div class="modal fade" id="editModal<?= $lesion['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Lesión</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaLesion'); ?>

                        <div class="form-group">
                            <?php

                            echo form_label('Fecha de inicio', 'fecha_inicio_lesion');
                            echo form_input(array('name' => 'fecha_inicio_lesion', 'placeholder' => 'Fecha de inicio', 'class' => 'form-control', 'value' => $lesion['fecha_inicio_lesion'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Fecha de fin', 'fecha_fin_lesion');
                            echo form_input(array('name' => 'fecha_fin_lesion', 'placeholder' => 'Fecha de fin', 'class' => 'form-control', 'value' => $lesion['fecha_fin_lesion'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('ID Jugador', 'jugador_id_fk');
                            echo form_input(array('name' => 'jugador_id_fk', 'placeholder' => 'ID Jugador', 'class' => 'form-control', 'value' => $lesion['jugador_id_fk'], 'required' => 'required'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaLesion', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $lesion['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach ($lesiones as $lesion) : ?>
        <div class="modal fade" id="deleteModal<?= $lesion['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Lesión</h5>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar esta lesión?</p>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open('AdminDashboard/eliminaLesion'); ?>
                        <?php echo form_hidden('id', $lesion['id']); ?>
                        <?php echo form_submit('eliminaLesion', 'Eliminar', 'class="btn btn-danger"'); ?>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Lesión</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Fecha de inicio</th>
                                        <th scope="col">Fecha de fin</th>
                                        <th scope="col">ID Jugador</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lesiones as $lesion) : ?>
                                        <tr>
                                            <td><?= $lesion['id'] ?></td>
                                            <td><?= $lesion['fecha_inicio_lesion'] ?></td>
                                            <td><?= $lesion['fecha_fin_lesion'] ?></td>
                                            <td><?= $lesion['jugador_id_fk'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $lesion['id'] ?>">Editar</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $lesion['id'] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Fecha de inicio</th>
                                        <th scope="col">Fecha de fin</th>
                                        <th scope="col">ID Jugador</th>
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
