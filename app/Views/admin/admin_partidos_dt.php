<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Partidos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                        <li class="breadcrumb-item active">Partidos</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Partido</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaPartido', 'id="myForm"'); ?>

                    <div class="form-group">
                        <?php
                        echo form_label('Equipo Local', 'equipo_local_fk');
                        echo form_input(array('name' => 'equipo_local_fk', 'placeholder' => 'Equipo Local', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Equipo Visita', 'equipo_visita_fk');
                        echo form_input(array('name' => 'equipo_visita_fk', 'placeholder' => 'Equipo Visita', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Ubicación', 'ubicacion_fk');
                        echo form_input(array('name' => 'ubicacion_fk', 'placeholder' => 'Ubicación', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Fecha', 'fecha');
                        echo form_input(array('name' => 'fecha', 'placeholder' => 'Fecha', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('ID Campeonato', 'campeonato_id_fk');
                        echo form_input(array('name' => 'campeonato_id_fk', 'placeholder' => 'ID Campeonato', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo form_submit('guardaPartido', 'Guardar', 'class="btn btn-primary"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <?php foreach ($partidos as $partido) : ?>
        <div class="modal fade" id="editModal<?= $partido['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Partido</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaPartido'); ?>

                        <div class="form-group">
                            <?php
                            echo form_label('Equipo Local', 'equipo_local_fk');
                            echo form_input(array('name' => 'equipo_local_fk', 'placeholder' => 'Equipo Local', 'class' => 'form-control', 'value' => $partido['equipo_local_fk'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Equipo Visita', 'equipo_visita_fk');
                            echo form_input(array('name' => 'equipo_visita_fk', 'placeholder' => 'Equipo Visita', 'class' => 'form-control', 'value' => $partido['equipo_visita_fk'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Ubicación', 'ubicacion_fk');
                            echo form_input(array('name' => 'ubicacion_fk', 'placeholder' => 'Ubicación', 'class' => 'form-control', 'value' => $partido['ubicacion_fk'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Fecha', 'fecha');
                            echo form_input(array('name' => 'fecha', 'placeholder' => 'Fecha', 'class' => 'form-control', 'value' => $partido['fecha'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('ID Campeonato', 'campeonato_id_fk');
                            echo form_input(array('name' => 'campeonato_id_fk', 'placeholder' => 'ID Campeonato', 'class' => 'form-control', 'value' => $partido['campeonato_id_fk'], 'required' => 'required'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaPartido', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $partido['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach ($partidos as $partido) : ?>
        <div class="modal fade" id="deleteModal<?= $partido['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Partido</h5>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar este partido?</p>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open('AdminDashboard/eliminaPartido'); ?>
                        <?php echo form_hidden('id', $partido['id']); ?>
                        <?php echo form_submit('eliminaPartido', 'Eliminar', 'class="btn btn-danger"'); ?>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Partido</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Equipo Local</th>
                                        <th scope="col">Equipo Visita</th>
                                        <th scope="col">Ubicación</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">ID Campeonato</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($partidos as $partido) : ?>
                                        <tr>
                                            <td><?= $partido['id'] ?></td>
                                            <td><?= $partido['equipo_local_fk'] ?></td>
                                            <td><?= $partido['equipo_visita_fk'] ?></td>
                                            <td><?= $partido['ubicacion_fk'] ?></td>
                                            <td><?= $partido['fecha'] ?></td>
                                            <td><?= $partido['campeonato_id_fk'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $partido['id'] ?>">Editar</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $partido['id'] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Equipo Local</th>
                                        <th scope="col">Equipo Visita</th>
                                        <th scope="col">Ubicación</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">ID Campeonato</th>
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
