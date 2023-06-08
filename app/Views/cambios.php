<!DOCTYPE html>
<html>
<head>
    <title>Último Partido</title>
</head>
<body>
    <h1>Último Partido</h1>
    <?php foreach ($results as $row) : ?>
        <p>Equipo: Los Alces FC</p>
        <p>Minuto Cambio: <?php echo $row['minuto']; ?></p>
        <p>Jugador saliente: <?php echo $row['jugador_saliente']; ?></p>
        <p>Jugador entrante: <?php echo $row['jugador_entrante']; ?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>