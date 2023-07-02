<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tarjetas Partido</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                        <li class="breadcrumb-item active">Tarjetas Partido</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Tarjeta Partido</h5>
                    <button type="button" class="fa fa-times" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaTarjetaPartido', 'id="myForm"'); ?>

                    <div class="form-group">
                        <?php

                        echo form_label('ID Jugador', 'jugador_fk');
                        echo form_input(array('name' => 'jugador_fk', 'placeholder' => 'ID Jugador', 'class' => 'form-control'));
                        echo "<br>";

                        echo form_label('Minuto', 'minuto');
                        echo form_input(array('name' => 'minuto', 'placeholder' => 'Minuto', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('ID Partido', 'partido_fk');
                        echo form_input(array('name' => 'partido_fk', 'placeholder' => 'ID Partido', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Jugador Externo', 'jugador_externo');
                        echo form_input(array('name' => 'jugador_externo', 'placeholder' => 'Jugador Externo', 'class' => 'form-control'));
                        echo "<br>";

                        echo form_label('Tarjeta', 'tarjeta');
                        echo form_input(array('name' => 'tarjeta', 'placeholder' => 'Tarjeta', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo form_submit('guardaTarjetaPartido', 'Guardar', 'class="btn btn-primary"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <?php foreach ($tarjetaspartido as $tarjetapartido) : ?>
        <div class="modal fade" id="editModal<?= $tarjetapartido['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Tarjeta Partido</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaTarjetaPartido'); ?>

                        <div class="form-group">
                            <?php

                            echo form_label('ID Jugador', 'jugador_fk');
                            echo form_input(array('name' => 'jugador_fk', 'placeholder' => 'ID Jugador', 'class' => 'form-control', 'value' => $tarjetapartido['jugador_fk']));
                            echo "<br>";

                            echo form_label('Minuto', 'minuto');
                            echo form_input(array('name' => 'minuto', 'placeholder' => 'Minuto', 'class' => 'form-control', 'value' => $tarjetapartido['minuto'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('ID Partido', 'partido_fk');
                            echo form_input(array('name' => 'partido_fk', 'placeholder' => 'ID Partido', 'class' => 'form-control', 'value' => $tarjetapartido['partido_fk'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Jugador Externo', 'jugador_externo');
                            echo form_input(array('name' => 'jugador_externo', 'placeholder' => 'Jugador Externo', 'class' => 'form-control', 'value' => $tarjetapartido['jugador_externo']));
                            echo "<br>";

                            echo form_label('Tarjeta', 'tarjeta');
                            echo form_input(array('name' => 'tarjeta', 'placeholder' => 'Tarjeta', 'class' => 'form-control', 'value' => $tarjetapartido['tarjeta'], 'required' => 'required'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaTarjetaPartido', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $tarjetapartido['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach ($tarjetaspartido as $tarjetapartido) : ?>
        <div class="modal fade" id="deleteModal<?= $tarjetapartido['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Tarjeta Partido</h5>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar esta tarjeta partido?</p>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open('AdminDashboard/borrarTarjetaPartido'); ?>
                        <?php echo form_hidden('id', $tarjetapartido['id']); ?>
                        <?php echo form_submit('borrarTarjetaPartido', 'Eliminar', 'class="btn btn-danger"'); ?>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Tarjeta Partido</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ID Jugador</th>
                                        <th scope="col">Minuto</th>
                                        <th scope="col">ID Partido</th>
                                        <th scope="col">Jugador Externo</th>
                                        <th scope="col">Tarjeta</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tarjetaspartido as $tarjetapartido) : ?>
                                        <tr>
                                            <td><?= $tarjetapartido['id'] ?></td>
                                            <td><?= $tarjetapartido['jugador_fk'] ?></td>
                                            <td><?= $tarjetapartido['minuto'] ?></td>
                                            <td><?= $tarjetapartido['partido_fk'] ?></td>
                                            <td><?= $tarjetapartido['jugador_externo'] ?></td>
                                            <td><?= $tarjetapartido['tarjeta'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $tarjetapartido['id'] ?>">Editar</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $tarjetapartido['id'] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ID Jugador</th>
                                        <th scope="col">Minuto</th>
                                        <th scope="col">ID Partido</th>
                                        <th scope="col">Jugador Externo</th>
                                        <th scope="col">Tarjeta</th>
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

<!-- Note: Please make sure to review and test the code before using it in your project as I have made some assumptions based on the provided information. -->
