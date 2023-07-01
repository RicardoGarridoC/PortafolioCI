<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<?php if(session('success')): ?>
    <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 3000); 
    </script>
<?php endif; ?>



<div class="detalle-producto">
    <div class="detalle-image-container">
        <?php
            $fotoData = $producto['foto'];
            $fotoBase64 = base64_encode($fotoData);
            $fotoSrc = 'data:image/jpeg;base64,' . $fotoBase64;
        ?>
        <img class="detalle-image" src="<?= $fotoSrc; ?>" alt="<?= $producto['producto']; ?>">
    </div>
    <div class="detalle-info">
        <a href="<?= site_url('VentaSouvenirsController/cargaArticulos'); ?>" class="volver-atras">Volver a productos</a>
        <h2 class="detalle-title"><?= $producto['producto']; ?></h2>
        <p class="detalle-price">Precio: $<?= number_format($producto['precio'], 0, ',', '.'); ?></p>
        <p class="detalle-genero">Género: <?= $producto['genero']; ?></p>
        <p class="detalle-detail"><?= $producto['detalle']; ?></p>
        <a href="<?= base_url('VentaSouvenirsController/agregarProducto/' . $producto['id']); ?>" class="agregar-carro">Agregar al Carro</a>
    </div>
</div>
<a href="<?= base_url('VentaSouvenirsController/mostrarCarro'); ?>" class="floating-button" title="Ver Carro de Compras">
    <i class="fas fa-shopping-cart"></i>
</a>

<style>
    .detalle-producto {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px auto;
        max-width: 1200px; /* Opcional: ajusta el ancho máximo según tus necesidades */
    }

    @media (max-width: 600px) {
        .detalle-producto {
            flex-direction: column; /* En pantallas menores a 600px, los hijos se organizan en una columna */
        }

        .detalle-info {
            margin-left: 0; /* Quitamos el margen izquierdo en pantallas pequeñas */
            text-align: center; /* Centramos el texto en pantallas pequeñas */
        }
    }

    .detalle-image-container {
        max-width: 700px; /* Ajusta el valor para cambiar el tamaño máximo de la imagen */
        overflow: hidden;
    }

    .detalle-image {
        width: 100%;
        height: auto;
    }

    .detalle-info {
        flex: 1;
        margin-left: 20px;
    }

    .detalle-title {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .detalle-price {
        font-size: 20px;
        color: #888;
        margin-bottom: 10px;
    }

    .detalle-genero {
        font-size: 16px;
        color: #888;
        margin-bottom: 10px;
    }

    .detalle-detail {
        font-size: 16px;
        margin-bottom: 20px;
    }
    
    .agregar-carro {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease-in-out;
    }
    
    .agregar-carro:hover {
        background-color: #45a049;
    }
    .volver-atras {
        display: inline-block;
        margin-bottom: 10px;
        color: #888;
        text-decoration: none;
        font-size: 16px;
    }

    .volver-atras::before {
        content: "\2190"; 
        margin-right: 5px;
    }
    .floating-button {
        position: fixed;
        right: 20px;
        bottom: 70px;
        background-color: #4CAF50;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        text-align: center;
        line-height: 50px;
        font-size: 20px;
        z-index: 9999;
        transition: background-color 0.3s ease-in-out;
    }

    .floating-button:hover {
        background-color: #45a049;
    }
</style>


