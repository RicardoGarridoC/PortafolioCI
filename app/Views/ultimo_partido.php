<!DOCTYPE html>
<html>
<head>
    <title>Último Partido</title>
</head>
<body>
    <h1>Último Partido</h1>
    <?php ?>
        <p><?php var_dump($results); ?></p>
        <p><?php echo $results[0]->equipo_local; ?></p>
        <p><?php echo $results[0]->goles_equipo_local; ?></p>
        <p><?php echo $results[0]->equipo_visita; ?></p>
        <p><?php echo $results[0]->goles_equipo_visita; ?></p>
</body>
</html>
