<?= $this->extend('layout/admin_template') ?>
    <?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Equipo Tecnico</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                <li class="breadcrumb-item active">Equipo Tecnico</li>
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo Tecnico</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaEquipoTecnico', 'id="myForm"'); ?>
                        
                        <div class="form-group">
                            <?php

                            echo form_label('Cargo', 'cargo');
                            echo form_input(array('name' => 'cargo', 'placeholder' => 'Cargo', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Equipo Proviene', 'equipo_proviene_fk');
                            echo form_input(array('name' => 'equipo_proviene_fk', 'placeholder' => 'Equipo Proviene', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Sueldo', 'sueldo');
                            echo form_input(array('name' => 'sueldo', 'placeholder' => 'Sueldo', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Valor Hora Extra', 'valor_hora_extra');
                            echo form_input(array('name' => 'valor_hora_extra', 'placeholder' => 'Valor Hora Extra', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Horas Extras Mes', 'horas_extras_mes');
                            echo form_input(array('name' => 'horas_extras_mes', 'placeholder' => 'Horas Extras Mes', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_submit('guardaEquipoTecnico', 'Guardar', 'class="btn btn-primary"'); ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <?php foreach($equipots as $equipot): ?>
        <div class="modal fade" id="editModal<?=$equipot['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Equipo Tecnico</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaEquipoTecnico'); ?>
                    
                        <div class="form-group">
                            <?php
                            
                            echo form_label('Cargo', 'cargo');
                            echo form_input(array('name' => 'cargo', 'placeholder' => 'Cargo', 'class' => 'form-control', 'value' => $equipot['cargo'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Equipo Proviene FK', 'equipo_proviene_fk');
                            echo form_input(array('name' => 'equipo_proviene_fk', 'placeholder' => 'Equipo Proviene FK', 'class' => 'form-control', 'value' => $equipot['equipo_proviene_fk'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Sueldo', 'sueldo');
                            echo form_input(array('name' => 'sueldo', 'placeholder' => 'Sueldo', 'class' => 'form-control', 'value' => $equipot['sueldo'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Valor Hora Extra', 'valor_hora_extra');
                            echo form_input(array('name' => 'valor_hora_extra', 'placeholder' => 'Valor Hora Extra', 'class' => 'form-control', 'value' => $equipot['valor_hora_extra'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Horas Extras Mes', 'horas_extras_mes');
                            echo form_input(array('name' => 'horas_extras_mes', 'placeholder' => 'Horas Extras Mes', 'class' => 'form-control', 'value' => $equipot['horas_extras_mes'], 'required' => 'required'));
                            echo "<br>";
                            
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaEquipoTecnico', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $equipot['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Modal Eliminar -->
        <?php foreach($equipots as $equipot): ?>
        <div class="modal fade" id="deleteModal<?=$equipot['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro que quieres eliminar al equipo tecnico?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="<?php echo base_url(); ?>AdminDashboard/borrarEquipoTecnico?id=<?php echo $equipot['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Eliminar</a>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Equipo Tecnico</button>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Equipo Proviene</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Valor Hora Extra</th>
                                    <th scope="col">Horas Extras Mes</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($equipots as $equipot){
                                    echo "<tr data-jugador-id='".$equipot['id']."'>";
                                    echo "<td>".$equipot['id']."</td>";
                                    echo "<td>".$equipot['cargo']."</td>";
                                    echo "<td>".$equipot['equipo_proviene_fk']."</td>";
                                    echo "<td>".$equipot['sueldo']."</td>";
                                    echo "<td>".$equipot['valor_hora_extra']."</td>";
                                    echo "<td>".$equipot['horas_extras_mes']."</td>";
                                    echo "<td>";
                                    echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$equipot['id']."'>Editar</button>";
                                    echo "<button type='button' name='button_field' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal". $equipot['id'] . "'>Borrar</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Equipo Proviene</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Valor Hora Extra</th>
                                    <th scope="col">Horas Extras Mes</th>
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
