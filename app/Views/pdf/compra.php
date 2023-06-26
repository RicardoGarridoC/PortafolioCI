<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boleta de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Boleta de Compra</h2>
    <p><strong>ID de compra:</strong> <?= $idCompra; ?></p>
    <p><strong>Nombre:</strong> <?= $nombre; ?></p>
    <p><strong>Teléfono:</strong> <?= $telefono; ?></p>

    <?php if ($entrega === 'domicilio'): ?>
        <p><strong>Entrega:</strong> Despacho a domicilio</p>
        <p><strong>Dirección de envío:</strong> <?= $direccion; ?></p>
    <?php else: ?>
        <p><strong>Entrega:</strong> Retiro en club</p>
        <p>Cuenta con 30 días a partir de la compra para retirar sus productos.</p>
        <p>Dirección Progreso 720, Chiguayante, Bío Bío</p>
    <?php endif; ?>

    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['nombre']; ?></td>
                <td><?= $producto['cantidad']; ?></td>
                <td>$<?= $producto['precio']; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="total">
            <td colspan="2">Total</td>
            <td>$<?= $total; ?></td>
        </tr>
    </table>
</body>
</html>