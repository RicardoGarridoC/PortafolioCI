<?= $this->extend('layout/jugador_template') ?>

<?= $this->section('contenido') ?>

<!-- Button trigger modal -->
<div class="row">
    <?php foreach ($results as $jugador) { ?>
        <div class="card mb-3 mx-auto col-12 col-sm-6 col-md-4 col-lg-3 card-sm">
            <?php
            $fotoData = $jugador['foto'];
            $fotoBase64 = base64_encode($fotoData);
            $fotoSrc = 'data:image/jpeg;base64,' . $fotoBase64;
            ?>
            <img class="card-img-top" src="<?php echo $fotoSrc; ?>" alt="Imagen de <?php echo $jugador['nombres'] . ' ' . $jugador['apellidos']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $jugador['nombres'] . ' ' . $jugador['apellidos']; ?></h5>
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
                                <th scope="row">Posicion:</th>
                                <td><?php echo $jugador['posicion']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Genero:</th>
                                <td><?php echo $jugador['genero']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Partidos jugados:</th>
                                <td><?php echo $jugador['partidos_jugados']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Equipo anterior</th>
                                <td><?php echo $jugador['equipo_proviene']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Estatuto:</th>
                                <td><?php echo $jugador['tipo']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Sueldo:</th>
                                <td>$<?php echo $jugador['sueldo']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Ayuda económica:</th>
                                <td>$<?php echo $jugador['ayuda_economica']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">N°Camiseta:</th>
                                <td><?php echo $jugador['numero_camiseta']; ?></td>
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