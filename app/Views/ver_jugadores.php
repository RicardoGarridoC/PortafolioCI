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
    <!-- Button trigger modal -->
    <div class="row">
    <?php foreach ($jugadores as $jugador) { ?>
    <div class="card mb-3 mx-auto col-12 col-sm-6 col-md-4 col-lg-3 card-sm">
        <img class="card-img-top" src="<?php echo $jugador['foto_url']; ?>" alt="Imagen de <?php echo $jugador['nombres']. ' ' . $jugador['apellidos']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $jugador['nombres']. ' ' . $jugador['apellidos']; ?></h5>
            <p class="card-text"><?php echo $jugador['run']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $jugador['id']; ?>">Ver Perfil</a>
                <small class="text-muted"><?php echo $jugador['posicion']; ?></small>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?php echo $jugador['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perfil Jugador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <td>$<?php echo $jugador['sueldo']; ?></td>
                            </tr>
                                <th scope="row">Ayuda económica:</th>
                                <td>$<?php echo $jugador['ayuda_economica']; ?></td>
                            </tr>
                                <th scope="row">Lesionado:</th>
                                <td><?php echo $jugador['lesionado']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    </div>

    <?= $this->endSection() ?>
   
    

</body>
</html>
