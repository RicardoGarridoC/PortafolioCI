<?= $this->extend('layout/admin_template') ?>
    <?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Resultados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                <li class="breadcrumb-item active">Resultados</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Modal Editar -->
        <?php foreach($resultados as $resultado): ?>
        <div class="modal fade" id="editModal<?=$resultado['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Resultado</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaResultado'); ?>
                    
                        <div class="form-group">
                            <?php
                            
                            echo form_label('Equipo Local', 'equipo_local_fk');
                            echo form_input(array('name' => 'equipo_local_fk', 'placeholder' => 'Equipo Local', 'class' => 'form-control', 'value' => $resultado['equipo_local_fk'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Equipo Visita', 'equipo_visita_fk');
                            echo form_input(array('name' => 'equipo_visita_fk', 'placeholder' => 'Equipo Visita', 'class' => 'form-control', 'value' => $resultado['equipo_visita_fk'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Goles Local', 'goles_local');
                            echo form_input(array('name' => 'goles_local', 'placeholder' => 'Goles Local', 'class' => 'form-control', 'value' => $resultado['goles_local'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Goles Visita', 'goles_visita');
                            echo form_input(array('name' => 'goles_visita', 'placeholder' => 'Goles Visita', 'class' => 'form-control', 'value' => $resultado['goles_visita'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('ID Partido', 'id_partido_fk');
                            echo form_input(array('name' => 'id_partido_fk', 'placeholder' => 'ID Partido', 'class' => 'form-control', 'value' => $resultado['id_partido_fk']));
                            echo "<br>";

                            echo form_label('Campeonato ID', 'campeonato_id_fk');
                            echo form_input(array('name' => 'campeonato_id_fk', 'placeholder' => 'Campeonato ID', 'class' => 'form-control', 'value' => $resultado['campeonato_id_fk'], 'required' => 'required'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaResultado', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $resultado['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Modal Eliminar -->
        <?php foreach($resultados as $resultado): ?>
        <div class="modal fade" id="deleteModal<?=$resultado['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro que quieres eliminar resultado?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="<?php echo base_url(); ?>AdminDashboard/borrarResultado?id=<?php echo $resultado['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Eliminar</a>
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
                                        <th scope="col">Equipo Local</th>
                                        <th scope="col">Equipo Visita</th>
                                        <th scope="col">Goles Local</th>
                                        <th scope="col">Goles Visita</th>
                                        <th scope="col">ID Partido</th>
                                        <th scope="col">Campeonato ID</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($resultados as $resultado){
                                        echo "<tr data-resultado-id='".$resultado['id']."'>";
                                        echo "<td>".$resultado['id']."</td>";
                                        echo "<td>".$resultado['equipo_local_fk']."</td>";
                                        echo "<td>".$resultado['equipo_visita_fk']."</td>";
                                        echo "<td>".$resultado['goles_local']."</td>";
                                        echo "<td>".$resultado['goles_visita']."</td>";
                                        echo "<td>".$resultado['id_partido_fk']."</td>";
                                        echo "<td>".$resultado['campeonato_id_fk']."</td>";
                                        echo "<td>";
                                        echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$resultado['id']."'>Editar</button>";
                                        echo "<button type='button' name='button_field' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal". $resultado['id'] . "'>Borrar</button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Equipo Local</th>
                                        <th scope="col">Equipo Visita</th>
                                        <th scope="col">Goles Local</th>
                                        <th scope="col">Goles Visita</th>
                                        <th scope="col">ID Partido</th>
                                        <th scope="col">Campeonato ID</th>
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