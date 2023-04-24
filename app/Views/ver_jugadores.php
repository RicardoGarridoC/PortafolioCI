<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
</head>
<body>
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
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
                    <th scope="col">Fecha Lesion</th>
                    <th scope="col">Fecha Fin Lesion</th>
                    <th scope="col">Equipo ID</th>
                </tr>
            </thead>
        
        <?php
        foreach($jugadores as $jugador){
            echo "<tr>";
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
            echo "<td>".$jugador['fecha_inicio_lesion']."</td>";
            echo "<td>".$jugador['fecha_fin_lesion']."</td>";
            echo "<td>".$jugador['equipo_id']."</td>";
            echo "</tr>";
        }
        ?>
        </table>
    </div>
</body>
</html>
