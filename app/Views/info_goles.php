<!DOCTYPE html>
<html>
<head>
    <title>Último Partido</title>
</head>
<body>
    <h1>Último Partido</h1>
    <?php foreach ($results as $row) : ?>
        <p>Equipo: <?php echo $row['nombre_equipo']; ?></p>
        <p>Minuto Gol: <?php echo $row['minuto_gol']; ?></p>

        <?php if ($row['nombre_jugador']) : ?>
            <p>Nombre Jugador: <?php echo $row['nombre_jugador']; ?></p>
        <?php else: ?>
            <p>Nombre Jugador: Equipo Visitante</p>
        <?php endif; ?>

        <hr>
    <?php endforeach; ?>
</body>
</html>
