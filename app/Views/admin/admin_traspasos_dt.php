<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Traspasos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                        <li class="breadcrumb-item active">Traspasos</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Traspaso</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaTraspaso', 'id="myForm"'); ?>

                    <div class="form-group">
                        <?php

                        echo form_label('Nombre del Jugador', 'nombre_jugador');
                        echo form_input(array('name' => 'nombre_jugador', 'placeholder' => 'Nombre del Jugador', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Equipo de Origen', 'equipo_origen');
                        echo form_input(array('name' => 'equipo_origen', 'placeholder' => 'Equipo de Origen', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Equipo de Destino', 'equipo_destino');
                        echo form_input(array('name' => 'equipo_destino', 'placeholder' => 'Equipo de Destino', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Fecha de Traspaso', 'fecha_traspaso');
                        echo form_input(array('name' => 'fecha_traspaso', 'placeholder' => 'Fecha de Traspaso', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Monto', 'monto');
                        echo form_input(array('name' => 'monto', 'placeholder' => 'Monto', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo form_submit('guardaTraspaso', 'Guardar', 'class="btn btn-primary"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <?php foreach ($traspasos as $traspaso) : ?>
        <div class="modal fade" id="editModal<?= $traspaso['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Traspaso</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaTraspaso'); ?>

                        <div class="form-group">
                            <?php

                            echo form_label('Nombre del Jugador', 'nombre_jugador');
                            echo form_input(array('name' => 'nombre_jugador', 'placeholder' => 'Nombre del Jugador', 'class' => 'form-control', 'value' => $traspaso['nombre_jugador'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Equipo de Origen', 'equipo_origen');
                            echo form_input(array('name' => 'equipo_origen', 'placeholder' => 'Equipo de Origen', 'class' => 'form-control', 'value' => $traspaso['equipo_origen'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Equipo de Destino', 'equipo_destino');
                            echo form_input(array('name' => 'equipo_destino', 'placeholder' => 'Equipo de Destino', 'class' => 'form-control', 'value' => $traspaso['equipo_destino'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Fecha de Traspaso', 'fecha_traspaso');
                            echo form_input(array('name' => 'fecha_traspaso', 'placeholder' => 'Fecha de Traspaso', 'class' => 'form-control', 'value' => $traspaso['fecha_traspaso'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Monto', 'monto');
                            echo form_input(array('name' => 'monto', 'placeholder' => 'Monto', 'class' => 'form-control', 'value' => $traspaso['monto'], 'required' => 'required'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaTraspaso', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $traspaso['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach ($traspasos as $traspaso) : ?>
        <div class="modal fade" id="deleteModal<?= $traspaso['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Traspaso</h5>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar este traspaso?</p>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open('AdminDashboard/eliminaTraspaso'); ?>
                        <?php echo form_hidden('id', $traspaso['id']); ?>
                        <?php echo form_submit('eliminaTraspaso', 'Eliminar', 'class="btn btn-danger"'); ?>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Traspaso</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre del Jugador</th>
                                        <th scope="col">Equipo de Origen</th>
                                        <th scope="col">Equipo de Destino</th>
                                        <th scope="col">Fecha de Traspaso</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($traspasos as $traspaso) : ?>
                                        <tr>
                                            <td><?= $traspaso['id'] ?></td>
                                            <td><?= $traspaso['nombre_jugador'] ?></td>
                                            <td><?= $traspaso['equipo_origen'] ?></td>
                                            <td><?= $traspaso['equipo_destino'] ?></td>
                                            <td><?= $traspaso['fecha_traspaso'] ?></td>
                                            <td><?= $traspaso['monto'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $traspaso['id'] ?>">Editar</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $traspaso['id'] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre del Jugador</th>
                                        <th scope="col">Equipo de Origen</th>
                                        <th scope="col">Equipo de Destino</th>
                                        <th scope="col">Fecha de Traspaso</th>
                                        <th scope="col">Monto</th>
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
