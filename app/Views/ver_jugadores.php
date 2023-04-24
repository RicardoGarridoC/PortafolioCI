<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>RUN</th>
            <th>Fecha de Nacimiento</th>
            <th>Foto</th>
            <th>Posicion</th>
            <th>Goles</th>
            <th>Partidos Jugados</th>
            <th>Equipo</th>
            <th>Tipo</th>
            <th>Sueldo</th>
            <th>Ayuda</th>
            <th>Lesionado</th>
            <th>Fecha Lesion</th>
            <th>Fecha Fin Lesion</th>
            <th>Equipo ID</th>
        </tr>
    </table>
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
    /*nombres','apellidos','run','fecha_nacimiento','foto_url','posicion','goles'
    ,'partidos_jugados','equipo_proviene','tipo','sueldo','ayuda_economica','lesionado','fecha_inicio_lesion',
    'fecha_fin_lesion','equipo_id'*/
    ?>
</body>
</html>
