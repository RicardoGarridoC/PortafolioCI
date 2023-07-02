<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Socios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                <li class="breadcrumb-item active">Socios</li>
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Socio</h5>
                        <button type="button" class="fa fa-times" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaSocio', 'id="myForm"'); ?>
                        
                        <div class="form-group">
                            <?php

                            echo form_label('Fecha Pago', 'fecha_pago');
                            echo form_input(array('name' => 'fecha_pago', 'placeholder' => 'Fecha Pago', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Nombres', 'nombres');
                            echo form_input(array('name' => 'nombres', 'placeholder' => 'Nombres', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Apellidos', 'apellidos');
                            echo form_input(array('name' => 'apellidos', 'placeholder' => 'Apellidos', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Email', 'email');
                            echo form_input(array('name' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('RUN', 'run');
                            echo form_input(array('name' => 'run', 'placeholder' => 'RUN', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Dirección', 'direccion');
                            echo form_input(array('name' => 'direccion', 'placeholder' => 'Dirección', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Teléfono', 'telefono');
                            echo form_input(array('name' => 'telefono', 'placeholder' => 'Teléfono', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Contraseña', 'password_hash');
                            echo form_input(array('name' => 'password_hash', 'placeholder' => 'Contraseña', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_submit('guardaSocio', 'Guardar', 'class="btn btn-primary"'); ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <?php foreach($socios as $socio): ?>
        <div class="modal fade" id="editModal<?=$socio['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Socio</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaSocio'); ?>
                    
                        <div class="form-group">
                            <?php
                            
                            echo form_label('Fecha Pago', 'fecha_pago');
                            echo form_input(array('name' => 'fecha_pago', 'placeholder' => 'Fecha Pago', 'class' => 'form-control', 'value' => $socio['fecha_pago'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Nombres', 'nombres');
                            echo form_input(array('name' => 'nombres', 'placeholder' => 'Nombres', 'class' => 'form-control', 'value' => $socio['nombres'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Apellidos', 'apellidos');
                            echo form_input(array('name' => 'apellidos', 'placeholder' => 'Apellidos', 'class' => 'form-control', 'value' => $socio['apellidos'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Email', 'email');
                            echo form_input(array('name' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'value' => $socio['email'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('RUN', 'run');
                            echo form_input(array('name' => 'run', 'placeholder' => 'RUN', 'class' => 'form-control', 'value' => $socio['run'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Dirección', 'direccion');
                            echo form_input(array('name' => 'direccion', 'placeholder' => 'Dirección', 'class' => 'form-control', 'value' => $socio['direccion'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Teléfono', 'telefono');
                            echo form_input(array('name' => 'telefono', 'placeholder' => 'Teléfono', 'class' => 'form-control', 'value' => $socio['telefono'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Contraseña', 'password_hash');
                            echo form_input(array('name' => 'password_hash', 'placeholder' => 'Contraseña', 'class' => 'form-control', 'value' => $socio['password_hash'], 'required' => 'required'));
                            echo "<br>";
                            
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaSocio', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $socio['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Modal Eliminar -->
        <?php foreach($socios as $socio): ?>
        <div class="modal fade" id="deleteModal<?=$socio['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro que quieres eliminar al socio?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="<?php echo base_url(); ?>AdminDashboard/borrarSocio?id=<?php echo $socio['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Eliminar</a>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Socio</button>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha Pago</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">RUN</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($socios as $socio){
                                    echo "<tr data-jugador-id='".$socio['id']."'>";
                                    echo "<td>".$socio['id']."</td>";
                                    echo "<td>".$socio['fecha_pago']."</td>";
                                    echo "<td>".$socio['nombres']."</td>";
                                    echo "<td>".$socio['apellidos']."</td>";
                                    echo "<td>".$socio['email']."</td>";
                                    echo "<td>".$socio['run']."</td>";
                                    echo "<td>".$socio['direccion']."</td>";
                                    echo "<td>".$socio['telefono']."</td>";
                                    $password = (strlen($socio['password_hash']) > 10) ? substr($socio['password_hash'], 0, 10) . "..." : $socio['password_hash'];
                                    echo "<td>".$password."</td>";
                                    echo "<td>";
                                    echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$socio['id']."'>Editar</button>";
                                    echo "<button type='button' name='button_field' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal". $socio['id'] . "'>Borrar</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha Pago</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">RUN</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Contraseña</th>
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
