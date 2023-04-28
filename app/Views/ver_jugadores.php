<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-dBfjg3n50r/9zRR6oN/JSaLd6kG1sJl1eRUss/cPxrdxQIaE/fyAM8XKzBkEfmQC" crossorigin="anonymous"></script>


</head>
<body>
    <?= $this->extend('layout/sidebarsocio') ?>

    <?= $this->section('contenido') ?>
    
    <!--Tabla para Jugadores-->
    <div class="card-body">
        <div class="row container table-responsive" style="width:90%">
            <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">RUN</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Posicion</th>
                        <th scope="col">Goles</th>
                        <th scope="col">Partidos Jugados</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Sueldo</th>
                        <th scope="col">Ayuda</th>
                        <th scope="col">Lesionado</th>
                        <th scope="col">Equipo ID</th>
                    </tr>
                </thead>
            
            <?php
            foreach($jugadores as $jugador){
                echo "<tr>";
                echo "<td>".$jugador['id']."</td>";
                echo "<td>".$jugador['nombres']."</td>";
                echo "<td>".$jugador['apellidos']."</td>";
                echo "<td>".$jugador['run']."</td>";
                echo "<td>".$jugador['fecha_nacimiento']."</td>";
                echo "<td>".$jugador['foto_url']."</td>";
                echo "<td>".$jugador['posicion']."</td>";
                echo "<td>".$jugador['goles']."</td>";
                echo "<td>".$jugador['partidos_jugados']."</td>";
                echo "<td>".$jugador['equipo_proviene']."</td>";
                echo "<td>".$jugador['tipo']."</td>";
                echo "<td>".$jugador['sueldo']."</td>";
                echo "<td>".$jugador['ayuda_economica']."</td>";
                echo "<td>".$jugador['lesionado']."</td>";
                echo "<td>".$jugador['equipo_id']."</td>";
                echo "</tr>";
            }
            ?>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="width:90%">
    <?php foreach ($jugadores as $jugador) { ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="<?php echo $jugador['foto_url']; ?>" alt="Imagen de <?php echo $jugador['nombres']. ' ' . $jugador['apellidos']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $jugador['nombres']. ' ' . $jugador['apellidos']; ?></h5>
                    <p class="card-text"><?php echo $jugador['run']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#perfilModal<?php echo $jugador['id']; ?>">Ver perfil</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                        </div>
                        <small class="text-muted"><?php echo $jugador['posicion']; ?></small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="perfilModal<?php echo $jugador['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="perfilModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="perfilModalLabel"><?php echo $jugador['nombres'] . ' ' . $jugador['apellidos']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Nombre:</th>
                                    <td><?php echo $jugador['nombres']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido:</th>
                                    <td><?php echo $jugador['apellidos']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Run:</th>
                                    <td><?php echo $jugador['run']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Fecha de nacimiento:</th>
                                    <td><?php echo $jugador['fecha_nacimiento']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Posicion:</th>
                                    <td><?php echo $jugador['posicion']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Goles:</th>
                                    <td><?php echo $jugador['goles']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Partidos jugados:</th>
                                    <td><?php echo $jugador['partidos_jugados']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Equipo anterior</th>
                                    <td><?php echo $jugador['equipo_proviene']; ?></td>
                                </tr>
                                <th scope="row">Estatuto:</th>
                                <td><?php echo $jugador['tipo']; ?></td>
                                </tr>
                                <th scope="row">Sueldo:</th>
                                <td><?php echo $jugador['sueldo']; ?></td>
                                </tr>
                                <th scope="row">Ayuda económica:</th>
                                <td><?php echo $jugador['ayuda_economica']; ?></td>
                                </tr>
                                <th scope="row">Lesionado:</th>
                                <td><?php echo $jugador['lesionado']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>

    <?= $this->endSection() ?>
    <!--SCRIPTS-->
   
    

</body>
</html>
