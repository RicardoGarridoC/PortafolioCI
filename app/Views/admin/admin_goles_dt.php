<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Goles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                        <li class="breadcrumb-item active">Goles</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Gol</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaGol', 'id="myForm"'); ?>

                    <div class="form-group">
                        <?php

                        echo form_label('ID Partido', 'partido_id_fk');
                        echo form_input(array('name' => 'partido_id_fk', 'placeholder' => 'ID Partido', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('ID Jugador', 'jugador_id_fk');
                        echo form_input(array('name' => 'jugador_id_fk', 'placeholder' => 'ID Jugador', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Minuto', 'minuto');
                        echo form_input(array('name' => 'minuto', 'placeholder' => 'Minuto', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Jugador Visita', 'jugador_visita');
                        echo form_input(array('name' => 'jugador_visita', 'placeholder' => 'Jugador Visita', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo form_submit('guardaGol', 'Guardar', 'class="btn btn-primary"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <?php foreach ($goles as $gol) : ?>
        <div class="modal fade" id="editModal<?= $gol['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Gol</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaGol'); ?>

                        <div class="form-group">
                            <?php

                            echo form_label('ID Partido', 'partido_id_fk');
                            echo form_input(array('name' => 'partido_id_fk', 'placeholder' => 'ID Partido', 'class' => 'form-control', 'value' => $gol['partido_id_fk'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('ID Jugador', 'jugador_id_fk');
                            echo form_input(array('name' => 'jugador_id_fk', 'placeholder' => 'ID Jugador', 'class' => 'form-control', 'value' => $gol['jugador_id_fk'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Minuto', 'minuto');
                            echo form_input(array('name' => 'minuto', 'placeholder' => 'Minuto', 'class' => 'form-control', 'value' => $gol['minuto'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Jugador Visita', 'jugador_visita');
                            echo form_input(array('name' => 'jugador_visita', 'placeholder' => 'Jugador Visita', 'class' => 'form-control', 'value' => $gol['jugador_visita'], 'required' => 'required'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaGol', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $gol['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach ($goles as $gol) : ?>
        <div class="modal fade" id="deleteModal<?= $gol['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Gol</h5>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar este gol?</p>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open('AdminDashboard/eliminaGol'); ?>
                        <?php echo form_hidden('id', $gol['id']); ?>
                        <?php echo form_submit('eliminaGol', 'Eliminar', 'class="btn btn-danger"'); ?>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Gol</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ID Partido</th>
                                        <th scope="col">ID Jugador</th>
                                        <th scope="col">Minuto</th>
                                        <th scope="col">Jugador Visita</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($goles as $gol) : ?>
                                        <tr>
                                            <td><?= $gol['id'] ?></td>
                                            <td><?= $gol['partido_id_fk'] ?></td>
                                            <td><?= $gol['jugador_id_fk'] ?></td>
                                            <td><?= $gol['minuto'] ?></td>
                                            <td><?= $gol['jugador_visita'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $gol['id'] ?>">Editar</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $gol['id'] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ID Partido</th>
                                        <th scope="col">ID Jugador</th>
                                        <th scope="col">Minuto</th>
                                        <th scope="col">Jugador Visita</th>
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
