<head>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        
        .match-section,
        .championship-table {
            background-color: #222;
            padding: 20px;
            margin-bottom: 20px;
        }

        .match-section h2,
        .championship-table h2 {
            color: #fff;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .probando {
            background-color: #222;
            padding: 20px;
            margin-bottom: 20px;
        }
        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        }
        .logo {
        max-width: 100%;
        height: auto;
        }
        .carousel-item img {
        object-fit: cover;
        height: 100%;
        width: 100%;
        }
        .carousel-item {
            height: 500px;
        }
        #myTab .nav-link {
        color: white;
        border: none;
        border-radius: 0;
        }

        #myTab .nav-link.active {
            background-color: rgba(0, 0, 0, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

     <!-- Carousel -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?= base_url()?>public/images/paginamoose.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?= base_url()?>public/images/paginafutbol.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?= base_url()?>public/images/estadio2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <!-- Match Section 
    CAMBIAR ESTA SECCION CON LOS DATOS DE CAMPEONATO Y PARTIDO -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container probando">
                    <h2 class="text-center">Ultimo Partido</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="row text-center">
                                <div class="col-6">
                                    <h4><?php echo $results[0]->equipo_local; ?></h4>
                                    <img src="<?= base_url()?>public/images/logoalce1.png" class="logo" alt="">
                                    <h4><?php echo $results[0]->goles_equipo_local; ?></h4>
                                </div>
                                <div class="col-6">
                                    <h4><?php echo $results[0]->equipo_visita; ?></h4>
                                    <img src="<?= base_url()?>public/images/logovisita1.png" class="logo" alt="">
                                    <h4><?php echo $results[0]->goles_equipo_visita; ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- TABS -->
                            <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
                                <li class="nav-item flex-fill">
                                    <a class="nav-link active text-center" id="goles-tab" data-bs-toggle="tab" href="#goles" role="tab" aria-controls="goles" aria-selected="true">Goles</a>
                                </li>
                                <li class="nav-item flex-fill">
                                    <a class="nav-link text-center" id="cambios-tab" data-bs-toggle="tab" href="#cambios" role="tab" aria-controls="cambios" aria-selected="false">Cambios</a>
                                </li>
                                <li class="nav-item flex-fill">
                                    <a class="nav-link text-center" id="tarjetas-tab" data-bs-toggle="tab" href="#tarjetas" role="tab" aria-controls="tarjetas" aria-selected="false">Tarjetas</a>
                                </li>
                            </ul>
                            <!-- GOLES-->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="goles" role="tabpanel" aria-labelledby="goles-tab">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="text-start">
                                                <?php foreach ($results2 as $row) : ?>
                                                    <li><?php echo $row['nombre_jugador']; ?> <?php echo $row['minuto_gol']; ?>"</li>
                                                    <hr>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="text-end">
                                                <?php foreach ($results6 as $row) : ?>
                                                    <li><?php echo $row['nombre_jugador']; ?> <?php echo $row['minuto_gol']; ?>"</li>
                                                    <hr>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- CAMBIOS -->
                                <div class="tab-pane fade" id="cambios" role="tabpanel" aria-labelledby="cambios-tab">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="text-start">
                                                <?php foreach ($results3 as $row) : ?>
                                                    <li><?php echo $row['jugador_saliente']; ?> -> <?php echo $row['jugador_entrante']; ?> <?php echo $row['minuto']; ?>"</li>
                                                    <hr>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="text-end">
                                                <?php foreach ($results4 as $row) : ?>
                                                    <li><?php echo $row['jugador_saliente']; ?> -> <?php echo $row['jugador_entrante']; ?> <?php echo $row['minuto']; ?>"</li>
                                                    <hr>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- TARJETAS -->
                                <div class="tab-pane fade" id="tarjetas" role="tabpanel" aria-labelledby="tarjetas-tab">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="text-start">
                                                <?php foreach ($results5 as $row) : ?>
                                                    <li><?php echo $row['jugador']; ?> Tarjeta <?php echo $row['tarjeta']; ?> <?php echo $row['minuto']; ?>"</li>
                                                    <hr>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="text-end">
                                                <?php foreach ($results7 as $row) : ?>
                                                    <li><?php echo $row['jugador']; ?> Tarjeta <?php echo $row['tarjeta']; ?> <?php echo $row['minuto']; ?>"</li>
                                                    <hr>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="championship-table">
                    <h2 class="text-center">Campeonato</h2>
                    <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Equipo</th>
                            <th>PJ</th>
                            <th>PG</th>
                            <th>PE</th>
                            <th>PP</th>
                            <th>GF</th>
                            <th>GC</th>
                            <th>+/- </th>
                            <th>Puntaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results8 as $row): ?>
                            <tr>
                                <td><?php echo $row['equipo']; ?></td>
                                <td><?php echo $row['partidos_jugados']; ?></td>
                                <td><?php echo $row['partidos_ganados']; ?></td>
                                <td><?php echo $row['partidos_empatados']; ?></td>
                                <td><?php echo $row['partidos_perdidos']; ?></td>
                                <td><?php echo $row['goles_a_favor']; ?></td>
                                <td><?php echo $row['goles_en_contra']; ?></td>
                                <td><?php echo $row['diferencia_goles']; ?></td>
                                <td><?php echo $row['puntaje']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</body>