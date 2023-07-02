<?= $this->extend('layout/admin_template') ?>
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
                        <li class="breadcrumb-item active">Ingresos</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Ingreso</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaIngreso', 'id="myForm"'); ?>

                    <div class="form-group">
                        <?php

                        echo form_label('Concepto', 'concepto');
                        echo form_input(array('name' => 'concepto', 'placeholder' => 'Concepto', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Monto', 'monto');
                        echo form_input(array('name' => 'monto', 'placeholder' => 'Monto', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Fecha', 'fecha');
                        echo form_input(array('name' => 'fecha', 'placeholder' => 'Fecha', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Detalle', 'detalle');
                        echo form_input(array('name' => 'detalle', 'placeholder' => 'Detalle', 'class' => 'form-control'));
                        echo "<br>";

                        echo form_label('ID Usuario', 'id_usuario_fk');
                        echo form_input(array('name' => 'id_usuario_fk', 'placeholder' => 'ID Usuario', 'class' => 'form-control'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo form_submit('guardaIngreso', 'Guardar', 'class="btn btn-primary"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <?php foreach ($ingresos as $ingreso) : ?>
        <div class="modal fade" id="editModal<?= $ingreso['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Ingreso</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaIngreso'); ?>

                        <div class="form-group">
                            <?php

                            echo form_label('Concepto', 'concepto');
                            echo form_input(array('name' => 'concepto', 'placeholder' => 'Concepto', 'class' => 'form-control', 'value' => $ingreso['concepto'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Monto', 'monto');
                            echo form_input(array('name' => 'monto', 'placeholder' => 'Monto', 'class' => 'form-control', 'value' => $ingreso['monto'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Fecha', 'fecha');
                            echo form_input(array('name' => 'fecha', 'placeholder' => 'Fecha', 'class' => 'form-control', 'value' => $ingreso['fecha'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Detalle', 'detalle');
                            echo form_input(array('name' => 'detalle', 'placeholder' => 'Detalle', 'class' => 'form-control', 'value' => $ingreso['detalle']));
                            echo "<br>";

                            echo form_label('ID Usuario', 'id_usuario_fk');
                            echo form_input(array('name' => 'id_usuario_fk', 'placeholder' => 'ID Usuario', 'class' => 'form-control', 'value' => $ingreso['id_usuario_fk']));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaIngreso', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $ingreso['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach ($ingresos as $ingreso) : ?>
        <div class="modal fade" id="deleteModal<?= $ingreso['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Ingreso</h5>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar este ingreso?</p>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open('AdminDashboard/eliminaIngreso'); ?>
                        <?php echo form_hidden('id', $ingreso['id']); ?>
                        <?php echo form_submit('eliminaIngreso', 'Eliminar', 'class="btn btn-danger"'); ?>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Ingreso</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Detalle</th>
                                        <th scope="col">ID Usuario</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ingresos as $ingreso) : ?>
                                        <tr>
                                            <td><?= $ingreso['id'] ?></td>
                                            <td><?= $ingreso['concepto'] ?></td>
                                            <td><?= $ingreso['monto'] ?></td>
                                            <td><?= $ingreso['fecha'] ?></td>
                                            <td><?= $ingreso['detalle'] ?></td>
                                            <td><?= $ingreso['id_usuario_fk'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $ingreso['id'] ?>">Editar</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $ingreso['id'] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Concepto</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Detalle</th>
                                        <th scope="col">ID Usuario</th>
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
