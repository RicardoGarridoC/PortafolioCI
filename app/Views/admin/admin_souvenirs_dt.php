<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Souvenirs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tablas</a></li>
                        <li class="breadcrumb-item active">Souvenirs</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Souvenir</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('AdminDashboard/guardaSouvenir', 'id="myForm"'); ?>

                    <div class="form-group">
                        <?php

                        echo form_label('Producto', 'producto');
                        echo form_input(array('name' => 'producto', 'placeholder' => 'Producto', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Talla', 'talla');
                        echo form_input(array('name' => 'talla', 'placeholder' => 'Talla', 'class' => 'form-control'));
                        echo "<br>";

                        echo form_label('Precio', 'precio');
                        echo form_input(array('name' => 'precio', 'placeholder' => 'Precio', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";

                        echo form_label('Género', 'genero');
                        echo form_input(array('name' => 'genero', 'placeholder' => 'Género', 'class' => 'form-control'));
                        echo "<br>";

                        echo form_label('Detalle', 'detalle');
                        echo form_input(array('name' => 'detalle', 'placeholder' => 'Detalle', 'class' => 'form-control', 'required' => 'required'));
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo form_submit('guardaSouvenir', 'Guardar', 'class="btn btn-primary"'); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <?php foreach ($souvenirs as $souvenir) : ?>
        <div class="modal fade" id="editModal<?= $souvenir['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Souvenir</h5>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('AdminDashboard/guardaSouvenir'); ?>

                        <div class="form-group">
                            <?php

                            echo form_label('Producto', 'producto');
                            echo form_input(array('name' => 'producto', 'placeholder' => 'Producto', 'class' => 'form-control', 'value' => $souvenir['producto'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Talla', 'talla');
                            echo form_input(array('name' => 'talla', 'placeholder' => 'Talla', 'class' => 'form-control', 'value' => $souvenir['talla']));
                            echo "<br>";

                            echo form_label('Precio', 'precio');
                            echo form_input(array('name' => 'precio', 'placeholder' => 'Precio', 'class' => 'form-control', 'value' => $souvenir['precio'], 'required' => 'required'));
                            echo "<br>";

                            echo form_label('Género', 'genero');
                            echo form_input(array('name' => 'genero', 'placeholder' => 'Género', 'class' => 'form-control', 'value' => $souvenir['genero']));
                            echo "<br>";

                            echo form_label('Detalle', 'detalle');
                            echo form_input(array('name' => 'detalle', 'placeholder' => 'Detalle', 'class' => 'form-control', 'value' => $souvenir['detalle'], 'required' => 'required'));
                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php
                        echo form_submit('guardaSouvenir', 'Guardar', 'class="btn btn-primary"');
                        echo form_hidden('id', $souvenir['id']);
                        ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    <?php echo form_close(); ?>
                </div> 
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Eliminar -->
    <?php foreach ($souvenirs as $souvenir) : ?>
        <div class="modal fade" id="deleteModal<?= $souvenir['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Souvenir</h5>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar este souvenir?</p>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open('AdminDashboard/eliminaSouvenir'); ?>
                        <?php echo form_hidden('id', $souvenir['id']); ?>
                        <?php echo form_submit('eliminaSouvenir', 'Eliminar', 'class="btn btn-danger"'); ?>
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
                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#agregarModal">Añadir Souvenir</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Talla</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Género</th>
                                        <th scope="col">Detalle</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($souvenirs as $souvenir) : ?>
                                        <tr>
                                            <td><?= $souvenir['id'] ?></td>
                                            <td><?= $souvenir['producto'] ?></td>
                                            <td><?= $souvenir['talla'] ?></td>
                                            <td><?= $souvenir['precio'] ?></td>
                                            <td><?= $souvenir['genero'] ?></td>
                                            <td><?= $souvenir['detalle'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $souvenir['id'] ?>">Editar</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $souvenir['id'] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Talla</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Género</th>
                                        <th scope="col">Detalle</th>
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

