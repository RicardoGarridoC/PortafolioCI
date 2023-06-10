<!DOCTYPE html>
<html>
<head>
    <title>Tarjetas partido</title>
</head>
<body>
    <h1>Tarjetas partido</h1>
    <?php foreach ($results as $row) : ?>
        <p>Jugador: <?php echo $row['jugador']; ?></p>
        <p>Tarjeta: <?php echo $row['tarjeta']; ?></p>
        <p>Minuto tarjeta: <?php echo $row['minuto']; ?></p>
        <p>Equipo: <?php echo $row['equipo']; ?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>
