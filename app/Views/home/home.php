<head>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        .carousel-item {
            height: 400px;
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
    </style>
</head>
<body>
    Hola mundo <?php echo $nombres; ?>

     <!-- Carousel -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
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

    <!-- Match Section 
    CAMBIAR ESTA SECCION CON LOS DATOS DE CAMPEONATO Y PARTIDO -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container probando">
                    <h2 class="text-center">Ultimo Partido</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 text-start">
                                <h4>Equipo X</h4>
                                <img src="" alt="">
                                <h4 class="text-center">1</h4>
                                </div>
                                <div class="col-6 text-end">
                                <h4>Equipo Y</h4>
                                <img src="" alt="">
                                <h4 class="text-center">0</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col text-center">
                            <h4>Goles</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <ul class="col-6 text-start">
                                    <li>Probando 1</li>
                                </ul>
                                <ul class="col-6 text-end">
                                    <li>Probando 2</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col text-center">
                            <h4>Cambios</h4>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="row">
                                <ul class="col-6 text-start">
                                    <li>Cambio 1</li>
                                </ul>
                                <ul class="col-6 text-end">
                                    <li>Cambio 2</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col text-center">
                            <h4>Tarjetas</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <ul class="col-6 text-start">
                                    <li>Tarjeta 1</li>
                                </ul>
                                <ul class="col-6 text-end">
                                    <li>Tarjeta 2</li>
                                </ul>
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
                                <th>VS</th>
                                <th>Gano</th>
                                <th>Perdio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Equipo 1</td>
                                <td>10</td>
                                <td>7</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Equipo 2</td>
                                <td>10</td>
                                <td>6</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Equipo 3</td>
                                <td>10</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</body>