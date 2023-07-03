    <?= $this->extend('layout/admin_template') ?>
    <?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Equipos</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Equipos</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo</h5>
                    <button type="button" class="fa fa-times" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php echo form_open('AdminDashboard/guardaEquipo', 'id="myForm"'); ?>


                    
                    <div class="form-group">
                        <?php
                        echo form_label('Nombre', 'nombre');
                        echo form_input(array('name' => 'nombre', 'placeholder' => 'Nombre', 'class' => 'form-control','required' => 'required'));
                        echo "<br>";

                        echo form_label('Genero', 'genero');
                        echo form_input(array('name' => 'genero', 'placeholder' => 'Genero', 'class' => 'form-control','required' => 'required'));
                        echo "<br>";
                        echo form_label('Division', 'division_id_fk');
                        echo form_input(array('name' => 'division_id_fk', 'placeholder' => 'Division', 'class' => 'form-control','required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo form_submit('guardaEquipo', 'Guardar', 'class="btn btn-primary"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Editar -->
    <?php foreach($equipos as $equipo): ?>
    <div class="modal fade" id="editModal<?=$equipo['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar equipo</h5>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaEquipo'); ?>
                
                    <div class="form-group">
                        <?php
                        echo form_label('Nombre', 'nombre');
                        echo form_input(array('name' => 'nombre', 'placeholder' => 'Nombre', 'class' => 'form-control','required' => 'required', 'value' => $equipo['nombre']));
                        echo "<br>";

                        echo form_label('Genero', 'genero');
                        echo form_input(array('name' => 'genero', 'placeholder' => 'Genero', 'class' => 'form-control','required' => 'required', 'value' => $equipo['genero']));
                        echo "<br>";

                        echo form_label('Division', 'division_id_fk');
                        echo form_input(array('name' => 'division_id_fk', 'placeholder' => 'Division', 'class' => 'form-control','required' => 'required', 'value' => $equipo['division_id_fk']));
                        echo "<br>";
                          
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo form_submit('guardaEquipo', 'Guardar', 'class="btn btn-primary"');
                    echo form_hidden('id', $equipo['id']);
                    ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                <?php echo form_close(); ?>
            </div> 
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach($equipos as $equipo): ?>
    <div class="modal fade" id="deleteModal<?=$equipo['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que quieres eliminar al equipo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a href="<?php echo base_url(); ?>AdminDashboard/borrarEquipo?id=<?php echo $equipo['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Eliminar</a>
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
                        <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Equipo</button>
                            
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Division</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($equipos as $equipo){
                                echo "<tr>";
                                echo "<td>".$equipo['id']."</td>";
                                echo "<td>".$equipo['nombre']."</td>";
                                echo "<td>".$equipo['genero']."</td>";
                                //Hay que hacer que aparesca el nombre y no el id
                                echo "<td>".$equipo['division_id_fk']."</td>";
                                echo "<td>";
                                echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$equipo['id']."'>Editar</button>";
                                echo "<button type='button' name='button_field' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal". $equipo['id'] . "'>Borrar</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Division</th>
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