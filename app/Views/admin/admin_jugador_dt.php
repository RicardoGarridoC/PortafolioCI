    <?= $this->extend('layout/admin_template') ?>
    <?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jugadores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                <li class="breadcrumb-item active">Jugadores</li>
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Jugador</h5>
                        <button type="button" class="fa fa-times" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaJugador', 'id="myForm"'); ?>


                        
                        <div class="form-group">
                            <?php

                            echo form_label('Posición', 'posicion');
                            echo form_input(array('name' => 'posicion', 'placeholder' => 'Posición', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Partidos Jugados', 'partidos_jugados');
                            echo form_input(array('name' => 'partidos_jugados', 'placeholder' => 'Partidos Jugados', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Tipo', 'tipo');
                            echo form_input(array('name' => 'tipo', 'placeholder' => 'Tipo', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Sueldo', 'sueldo');
                            echo form_input(array('name' => 'sueldo', 'placeholder' => 'Sueldo', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Ayuda Económica', 'ayuda_economica');
                            echo form_input(array('name' => 'ayuda_economica', 'placeholder' => 'Ayuda Económica', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('N°Camiseta', 'numero_camiseta');
                            echo form_input(array('name' => 'numero_camiseta', 'placeholder' => 'N°Camiseta', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Equipo Proviene', 'equipo_proviene_id_fk');
                            echo form_input(array('name' => 'equipo_proviene_id_fk', 'placeholder' => 'Equipo Proviene', 'class' => 'form-control'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_submit('guardaJugador', 'Guardar', 'class="btn btn-primary"'); ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <?php foreach($jugadores as $jugador): ?>
        <div class="modal fade" id="editModal<?=$jugador['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Jugador</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaJugador'); ?>
                    
                        <div class="form-group">
                            <?php
                            
                            echo form_label('Posición', 'posicion');
                            echo form_input(array('name' => 'posicion', 'placeholder' => 'Posición', 'class' => 'form-control', 'value' => $jugador['posicion'], 'required' => 'required'));

                            echo "<br>";
                            
                            echo form_label('Partidos Jugados', 'partidos_jugados');
                            echo form_input(array('name' => 'partidos_jugados', 'placeholder' => 'Partidos Jugados', 'class' => 'form-control', 'value' => $jugador['partidos_jugados'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Tipo', 'tipo');
                            echo form_input(array('name' => 'tipo', 'placeholder' => 'Tipo', 'class' => 'form-control', 'value' => $jugador['tipo'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Sueldo', 'sueldo');
                            echo form_input(array('name' => 'sueldo', 'placeholder' => 'Sueldo', 'class' => 'form-control', 'value' => $jugador['sueldo'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Ayuda Económica', 'ayuda_economica');
                            echo form_input(array('name' => 'ayuda_economica', 'placeholder' => 'Ayuda Económica', 'class' => 'form-control', 'value' => $jugador['ayuda_economica'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('N°Camiseta', 'numero_camiseta');
                            echo form_input(array('name' => 'numero_camiseta', 'placeholder' => 'N°Camiseta', 'class' => 'form-control', 'value' => $jugador['numero_camiseta'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Equipo Proviene', 'equipo_proviene_id_fk');
                            echo form_input(array('name' => 'equipo_proviene_id_fk', 'placeholder' => 'Equipo Proviene', 'class' => 'form-control', 'value' => $jugador['equipo_proviene_id_fk']));
                            echo "<br>";

                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaJugador', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $jugador['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Modal Eliminar -->
        <?php foreach($jugadores as $jugador): ?>
        <div class="modal fade" id="deleteModal<?=$jugador['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro que quieres eliminar al jugador?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="<?php echo base_url(); ?>AdminDashboard/borrarJugador?id=<?php echo $jugador['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Eliminar</a>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Jugador</button>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Posicion</th>
                                    <th scope="col">Partidos Jugados</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Ayuda</th>
                                    <th scope="col">N°Camiseta</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($jugadores as $jugador){
                                    echo "<tr data-jugador-id='".$jugador['id']."'>";
                                    echo "<td>".$jugador['id']."</td>";
                                    echo "<td>".$jugador['posicion']."</td>";
                                    echo "<td>".$jugador['partidos_jugados']."</td>";
                                    echo "<td>".$jugador['tipo']."</td>";
                                    echo "<td>".$jugador['sueldo']."</td>";
                                    echo "<td>".$jugador['ayuda_economica']."</td>";
                                    echo "<td>".$jugador['numero_camiseta']."</td>";
                                    echo "<td>".$jugador['equipo_proviene_id_fk']."</td>";
                                    echo "<td>";
                                    echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$jugador['id']."'>Editar</button>";
                                    echo "<button type='button' name='button_field' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal". $jugador['id'] . "'>Borrar</button>";

                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Posicion</th>
                                    <th scope="col">Partidos Jugados</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Ayuda</th>
                                    <th scope="col">N°Camiseta</th>
                                    <th scope="col">Equipo</th>
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