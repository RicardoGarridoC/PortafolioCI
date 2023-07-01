<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cambios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                        <li class="breadcrumb-item active">Cambios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Modal Editar -->
    <?php foreach($cambios as $cambio): ?>
    <div class="modal fade" id="editModal<?=$cambio['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cambio</h5>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaCambio'); ?>
                
                    <div class="form-group">
                        <?php
                        echo form_label('Minuto', 'minuto');
                        echo form_input(array('name' => 'minuto', 'placeholder' => 'Minuto', 'class' => 'form-control', 'value' => $cambio['minuto'], 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Jugador Entrante', 'jugador_entrante_fk');
                        echo form_input(array('name' => 'jugador_entrante_fk', 'placeholder' => 'Jugador Entrante', 'class' => 'form-control', 'value' => $cambio['jugador_entrante_fk'], 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Jugador Saliente', 'jugador_saliente_fk');
                        echo form_input(array('name' => 'jugador_saliente_fk', 'placeholder' => 'Jugador Saliente', 'class' => 'form-control', 'value' => $cambio['jugador_saliente_fk'], 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Partido', 'partido_fk');
                        echo form_input(array('name' => 'partido_fk', 'placeholder' => 'Partido', 'class' => 'form-control', 'value' => $cambio['partido_fk'], 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo form_submit('guardaCambio', 'Guardar', 'class="btn btn-primary"');
                    echo form_hidden('id', $cambio['id']);
                    ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                <?php echo form_close(); ?>
            </div> 
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach($cambios as $cambio): ?>
    <div class="modal fade" id="deleteModal<?=$cambio['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que quieres eliminar el cambio?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a href="<?php echo base_url(); ?>AdminDashboard/borrarCambio?id=<?php echo $cambio['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Eliminar</a>
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
                                        <th scope="col">Minuto</th>
                                        <th scope="col">Jugador Entrante</th>
                                        <th scope="col">Jugador Saliente</th>
                                        <th scope="col">Partido</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($cambios as $cambio){
                                        echo "<tr data-cambio-id='".$cambio['id']."'>";
                                        echo "<td>".$cambio['id']."</td>";
                                        echo "<td>".$cambio['minuto']."</td>";
                                        echo "<td>".$cambio['jugador_entrante_fk']."</td>";
                                        echo "<td>".$cambio['jugador_saliente_fk']."</td>";
                                        echo "<td>".$cambio['partido_fk']."</td>";
                                        echo "<td>";
                                        echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$cambio['id']."'>Editar</button>";
                                        echo "<button type='button' name='button_field' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal". $cambio['id'] . "'>Borrar</button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Minuto</th>
                                        <th scope="col">Jugador Entrante</th>
                                        <th scope="col">Jugador Saliente</th>
                                        <th scope="col">Partido</th>
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
