<h2>Carro de Compras</h2>
<a href="<?= base_url('VentaSouvenirsController/cargaArticulos'); ?>" class="volver-tienda">Volver a la tienda</a>

<?php if (empty($productos)): ?>
    <p>No hay productos en el carro.</p>
<?php else: ?>
    <ul>
        <?php $total = 0; ?>
        <?php foreach ($productos as $producto): ?>
        <li>
            <div class="producto-item">
                <?php
                    $fotoData = $producto['foto'];
                    $fotoBase64 = base64_encode($fotoData);
                    $fotoSrc = 'data:image/jpeg;base64,' . $fotoBase64;
                ?>
                <img src="<?= $fotoSrc; ?>" alt="<?= $producto['nombre']; ?>">
                <div class="producto-info">
                    <h3><?= $producto['nombre']; ?></h3>
                    <p>Precio: $<?= $producto['precio']; ?></p>
                    <p>Cantidad: <?= $producto['cantidad']; ?></p>
                    <a href="<?= base_url('VentaSouvenirsController/eliminarProducto/' . $producto['id']); ?>" class="btn-eliminar-producto">Eliminar Producto</a>
                </div>
            </div>
        </li>
        <?php $total += $producto['precio'] * $producto['cantidad']; ?>
    <?php endforeach; ?>
    </ul>
    <p>Total: $<?= number_format($total, 2); ?></p>

    <div>
    <form action="<?= base_url('VentaSouvenirsController/vaciarCarro'); ?>" method="post" style="display: inline-block;">
        <button class="btn-vaciar-carro">Vaciar Carro</button>
    </form>
    <form action="<?= base_url('VentaSouvenirsController/checkout'); ?>" method="post" style="display: inline-block;">
        <button class="btn-comprar">Comprar</button>
    </form>
</div>


<?php endif; ?>

<style>
    .producto-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .producto-item img {
        width: 100px;
        height: auto;
        margin-right: 10px;
    }

    .producto-item h3 {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .producto-item p {
        font-size: 16px;
        color: #888;
        margin-bottom: 0;
    }

    .btn-vaciar-carro {
        background-color: #FF0000;
        color: #FFFFFF;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-vaciar-carro:hover {
        background-color: #FF3333;
    }

    .btn-comprar {
        background-color: #2FC126;
        color: #FFFFFF;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-comprar:hover {
        background-color: #48A442;
    }


    .btn-eliminar-producto {
        background-color: #FF0000;
        color: #FFFFFF;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-eliminar-producto:hover {
        background-color: #FF3333;
    }
    .volver-tienda {
        display: inline-block;
        margin-bottom: 20px;
        color: #888;
        text-decoration: none;
        font-size: 16px;
    }

    .volver-tienda:before {
        content: "\2190";
        margin-right: 5px;
    }

    .volver-tienda:hover {
        text-decoration: underline;
    }

    .btn-eliminar-producto {
        text-decoration: none;
    }
</style>


