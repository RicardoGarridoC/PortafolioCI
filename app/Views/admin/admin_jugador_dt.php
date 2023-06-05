<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DT - Jugadores</title>
    
</head>
<body>
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
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php echo form_open('/AdminDashboard/guardaJugador', 'id="myForm"'); ?>


                        
                        <div class="form-group">
                            <?php

                            echo form_label('Posición', 'posicion');
                            echo form_input(array('name' => 'posicion', 'placeholder' => 'Posición', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Goles', 'goles');
                            echo form_input(array('name' => 'goles', 'placeholder' => 'Goles', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Partidos Jugados', 'partidos_jugados');
                            echo form_input(array('name' => 'partidos_jugados', 'placeholder' => 'Partidos Jugados', 'class' => 'form-control', 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Equipo Proviene', 'equipo_proviene');
                            echo form_input(array('name' => 'equipo_proviene', 'placeholder' => 'Equipo Proviene', 'class' => 'form-control', 'required' => 'required'));
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
                            
                            echo form_label('Lesionado', 'lesionado');
                            echo form_input(array('name' => 'lesionado', 'placeholder' => 'Lesionado', 'class' => 'form-control', 'required' => 'required'));
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
                        <?php echo form_open('/AdminDashboard/guardaJugador'); ?>
                    
                        <div class="form-group">
                            <?php
                            //echo form_label('Nombres', 'nombres');
                            //echo form_input(array('name' => 'nombres', 'placeholder' => 'Nombres', 'class' => 'form-control', 'value' => $jugador['nombres']));
                            //echo "<br>";
                            
                            //echo form_label('Apellidos', 'apellidos');
                            //echo form_input(array('name' => 'apellidos', 'placeholder' => 'Apellidos', 'class' => 'form-control', 'value' => $jugador['apellidos']));
                            //echo "<br>";
                            
                            //echo form_label('RUN', 'run');
                            //echo form_input(array('name' => 'run', 'placeholder' => 'RUN', 'class' => 'form-control', 'value' => $jugador['run']));
                            //echo "<br>";
                            
                            //echo form_label('Fecha de Nacimiento', 'fecha_nacimiento');
                            //echo form_input(array('name' => 'fecha_nacimiento', 'placeholder' => 'Fecha de Nacimiento', 'class' => 'form-control', 'value' => $jugador['fecha_nacimiento']));
                            //echo "<br>";
                            
                            //echo form_label('URL de la Foto', 'foto_url');
                            //echo form_input(array('name' => 'foto_url', 'placeholder' => 'URL de la Foto', 'class' => 'form-control', 'value' => $jugador['foto_url']));
                            //echo "<br>";
                            
                            echo form_label('Posición', 'posicion');
                            echo form_input(array('name' => 'posicion', 'placeholder' => 'Posición', 'class' => 'form-control', 'value' => $jugador['posicion'], 'required' => 'required'));

                            echo "<br>";
                            
                            echo form_label('Goles', 'goles');
                            echo form_input(array('name' => 'goles', 'placeholder' => 'Goles', 'class' => 'form-control', 'value' => $jugador['goles'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Partidos Jugados', 'partidos_jugados');
                            echo form_input(array('name' => 'partidos_jugados', 'placeholder' => 'Partidos Jugados', 'class' => 'form-control', 'value' => $jugador['partidos_jugados'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Equipo Proviene', 'equipo_proviene');
                            echo form_input(array('name' => 'equipo_proviene', 'placeholder' => 'Equipo Proviene', 'class' => 'form-control', 'value' => $jugador['equipo_proviene'], 'required' => 'required'));
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
                            
                            echo form_label('Lesionado', 'lesionado');
                            echo form_input(array('name' => 'lesionado', 'placeholder' => 'Lesionado', 'class' => 'form-control', 'value' => $jugador['lesionado'], 'required' => 'required'));
                            echo "<br>";
                            
                            //echo form_label('ID del Equipo', 'equipo_id');
                            //echo form_input(array('name' => 'equipo_id', 'placeholder' => 'ID del Equipo', 'class' => 'form-control', 'value' => $jugador['equipo_id']));
                            //echo "<br>";
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
                                    <!--<th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">RUN</th>
                                    <th scope="col">Fecha de Nacimiento</th>-->
                                    <th scope="col">Posicion</th>
                                    <th scope="col">Goles</th>
                                    <th scope="col">Partidos Jugados</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Ayuda</th>
                                    <th scope="col">Lesionado</th>
                                    <!--<th scope="col">Foto</th>
                                    <th scope="col">Equipo ID</th>-->
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($jugadores as $jugador){
                                    echo "<tr data-jugador-id='".$jugador['id']."'>";
                                    echo "<td>".$jugador['id']."</td>";
                                    //echo "<td>".$jugador['nombres']."</td>";
                                    //echo "<td>".$jugador['apellidos']."</td>";
                                    //echo "<td>".$jugador['run']."</td>";
                                    //echo "<td>".$jugador['fecha_nacimiento']."</td>";
                                    echo "<td>".$jugador['posicion']."</td>";
                                    echo "<td>".$jugador['goles']."</td>";
                                    echo "<td>".$jugador['partidos_jugados']."</td>";
                                    echo "<td>".$jugador['equipo_proviene']."</td>";
                                    echo "<td>".$jugador['tipo']."</td>";
                                    echo "<td>".$jugador['sueldo']."</td>";
                                    echo "<td>".$jugador['ayuda_economica']."</td>";
                                    echo "<td>".$jugador['lesionado']."</td>";
                                    //echo "<td>".$jugador['foto_url']."</td>";
                                    //echo "<td>".$jugador['equipo_id']."</td>";
                                    echo "<td>";
                                    echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$jugador['id']."'>Editar</button>";
                                    echo "<button type='button' name='button_field' class='btn btn-danger' onclick='borrarJugador(" . $jugador['id'] . ")'>Borrar</button>";

                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <!--<th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">RUN</th>
                                    <th scope="col">Fecha de Nacimiento</th>-->
                                    <th scope="col">Posicion</th>
                                    <th scope="col">Goles</th>
                                    <th scope="col">Partidos Jugados</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Ayuda</th>
                                    <th scope="col">Lesionado</th>
                                    <!--<th scope="col">Foto</th>
                                    <th scope="col">Equipo ID</th>-->
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


</body>
</html>