    <?= $this->extend('layout/admin_template') ?>
    <?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuarios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                        <button type="button" class="fa fa-times" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaUsuario'); ?>

                        <div class="form-group">
                            <?php
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
                            
                            echo form_label('Rol', 'rol');
                            $options = array(
                                'administrador' => 'Administrador',
                                'direccion' => 'Direccion'
                            );
                            echo form_dropdown('rol', $options, '', 'class="form-control" required');
                            echo "<br>";               
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaUsuario', 'Guardar', 'class="btn btn-primary"');
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Editar -->
        <?php foreach($usuarios as $usuario): ?>
        <div class="modal fade" id="editModal<?=$usuario['id']?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaUsuario'); ?>
                    
                        <div class="form-group">
                            <?php
                            echo form_label('Nombres', 'nombres');
                            echo form_input(array('name' => 'nombres', 'placeholder' => 'Nombres', 'class' => 'form-control', 'value' => $usuario['nombres'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Apellidos', 'apellidos');
                            echo form_input(array('name' => 'apellidos', 'placeholder' => 'Apellidos', 'class' => 'form-control', 'value' => $usuario['apellidos'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Email', 'email');
                            echo form_input(array('name' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'value' => $usuario['email'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('RUN', 'run');
                            echo form_input(array('name' => 'run', 'placeholder' => 'RUN', 'class' => 'form-control', 'value' => $usuario['run'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Dirección', 'direccion');
                            echo form_input(array('name' => 'direccion', 'placeholder' => 'Dirección', 'class' => 'form-control', 'value' => $usuario['direccion'], 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Teléfono', 'telefono');
                            echo form_input(array('name' => 'telefono', 'placeholder' => 'Teléfono', 'class' => 'form-control', 'value' => $usuario['telefono'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Contraseña', 'password_hash');
                            if (isset($usuario['clavebuena'])) {
                                $passwordValue = $usuario['clavebuena'];
                            } else {
                                $passwordValue = '';
                            }
                            echo form_input(array('name' => 'password_hash', 'placeholder' => 'Contraseña', 'class' => 'form-control', 'value' => $passwordValue, 'required' => 'required'));
                            echo "<br>";
                            
                            echo form_label('Rol', 'rol');
                            $options = array(
                                'administrador' => 'Administrador',
                                'direccion' => 'Direccion',
                                'jugador' => 'Jugador',
                                'entrenador' => 'Entrenador',
                                'equipo_tecnico' => 'Equipo Técnico',
                                'socio' => 'Socio'
                            );
                            echo form_dropdown('rol', $options, $usuario['rol'], 'class="form-control" required');
                            echo "<br>";

                            
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaUsuario', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $usuario['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Modal Eliminar -->
        <?php foreach($usuarios as $usuario): ?>
        <div class="modal fade" id="deleteModal<?=$usuario['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro que quieres eliminar al usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="<?php echo base_url(); ?>AdminDashboard/borrarUsuario?id=<?php echo $usuario['id']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Eliminar</a>
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
                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Usuario</button>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>
                            <th scope="col">RUN</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($usuarios as $usuario){
                            echo "<tr data-jugador-id='".$usuario['id']."'>";
                            echo "<td>".$usuario['id']."</td>";
                            echo "<td>".$usuario['nombres']."</td>";
                            echo "<td>".$usuario['apellidos']."</td>";
                            echo "<td>".$usuario['email']."</td>";
                            echo "<td>".$usuario['run']."</td>";
                            echo "<td>".$usuario['direccion']."</td>";
                            echo "<td>".$usuario['telefono']."</td>";
                            echo "<td>";
                            echo "<input type='password' value='".$usuario['clavebuena']."' id='password_".$usuario['id']."' readonly>";
                            echo "<span class='input-group-text' onclick='togglePassword(".$usuario['id'].")'>";
                            echo "<i class='fas fa-eye nav-icon' id='show_eye_".$usuario['id']."'></i>";
                            echo "<i class='fas fa-eye-slash nav-icon d-none' id='hide_eye_".$usuario['id']."'></i>";
                            echo "</span>";
                            echo "</td>";
                            echo "<td>".$usuario['rol']."</td>";
                            echo "<td>";
                            echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal".$usuario['id']."'>Editar</button>";
                            echo "<button type='button' name='button_field' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal". $usuario['id'] . "'>Borrar</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>
                            <th scope="col">RUN</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Rol</th>
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
        <script>
            function togglePassword(id) {
            var passwordInput = document.getElementById('password_' + id);
            var showEyeIcon = document.getElementById('show_eye_' + id);
            var hideEyeIcon = document.getElementById('hide_eye_' + id);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showEyeIcon.classList.add('d-none');
                hideEyeIcon.classList.remove('d-none');
            } else {
                passwordInput.type = 'password';
                showEyeIcon.classList.remove('d-none');
                hideEyeIcon.classList.add('d-none');
            }
            }
        </script>


        
    <?= $this->endSection() ?>