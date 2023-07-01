<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Campeonatos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                    <li class="breadcrumb-item active">Campeonatos</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Editar -->
<?php foreach($campeonatos as $campeonato): ?>
    <div class="modal fade" id="editModal<?=$campeonato['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Campeonato</h5>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaCampeonato'); ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Nombre', 'nombre');
                        echo form_input(array('name' => 'nombre', 'placeholder' => 'Nombre', 'class' => 'form-control', 'value' => $campeonato['nombre'], 'required' => 'required'));
                        echo "<br>";

                        echo form_label('ID División', 'division_id_fk');
                        echo form_input(array('name' => 'division_id_fk', 'placeholder' => 'ID División', 'class' => 'form-control', 'value' => $campeonato['division_id_fk'], 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Temporada', 'temporada');
                        echo form_input(array('name' => 'temporada', 'placeholder' => 'Temporada', 'class' => 'form-control', 'value' => $campeonato['temporada'], 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo form_submit('guardaCampeonato', 'Guardar', 'class="btn btn-primary"');
                    echo form_hidden('id', $campeonato['id']);
                    ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Eliminar -->
<?php foreach($campeonatos as $campeonato): ?>
    <div class="modal fade" id="deleteModal<?=$campeonato['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que quieres eliminar el campeonato?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a href="<?php echo base_url(); ?>AdminDashboard/borrarCampeonato?id=<?php echo $campeonato['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Eliminar</a>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">ID División</th>
                                    <th scope="col">Temporada</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($campeonatos as $campeonato){
                                    echo "<tr data-campeonato-id='".$campeonato['id']."'>";
                                    echo "<td>".$campeonato['id']."</td>";
                                    echo "<td>".$campeonato['nombre']."</td>";
                                    echo "<td>".$campeonato['division_id_fk']."</td>";
                                    echo "<td>".$campeonato['temporada']."</td>";
                                    echo "<td>";
                                    echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$campeonato['id']."'>Editar</button>";
                                    echo "<button type='button' name='button_field' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal". $campeonato['id'] . "'>Borrar</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">ID División</th>
                                    <th scope="col">Temporada</th>
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
