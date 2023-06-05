<head>
    <style>
        body {
            background-color: #333;
            color: #fff;
            padding-top: 50px;
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
                <div class="match-section">
                    <h2>Ultimo Partido</h2>
                    <p>Equipo X vs Equipo Y</p>
                    <p>Puntaje: 0-0</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="championship-table">
                    <h2>Campeonato</h2>
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