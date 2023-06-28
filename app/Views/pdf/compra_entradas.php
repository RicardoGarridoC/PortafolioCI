<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Boleta de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222222;
            color: #ffffff;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #333333;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 200px;
            background-color: #ffffff; /* Establece un color de fondo si la imagen es transparente */
        }
        .content {
            margin-top: 30px;
        }
        .content p {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .team-names {
            text-align: center;
            margin-bottom: 20px;
        }
        .team-names .team-name {
            display: inline-block;
            padding: 5px 10px;
            font-size: 18px;
            font-weight: bold;
            background-color: #555555;
            border-radius: 5px;
        }
        .total {
            text-align: center;
            margin-top: 20px;
        }
        .total p {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Boleta de Compra</h1>
            <h4>ID Venta: <?= $id_venta ?></h4>
        </div>
        <div class="content">
            <p>Nombre: <?= $nombre_comprador ?></p>
            <p>RUT: <?= $rut_comprador ?></p>
            <div class="team-names">
                <span class="team-name"><?= $nombre_equipo_local ?></span>
                <span>VS</span>
                <span class="team-name"><?= $nombre_equipo_visita ?></span>
            </div>
            <p><?= $campeonato ?></p>
            <p><?= $nombre_cancha ?></p>
            <br>
            <p>Comprobante valido como entrada</p>
        </div>
        <div class="total">
            <p>Total: $<?= $monto ?></p>
        </div>
    </div>
</body>
</html>

