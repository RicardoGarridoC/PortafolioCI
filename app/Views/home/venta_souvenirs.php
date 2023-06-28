<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
    body {
      margin: 0;
      padding: 0;
    }

    .content-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    footer {
      width: 100%;
      text-align: center;
      background-color: #111;
      color: white;
      padding: 20px;
      position: fixed;
      bottom: 0;
    }

    .footer p {
      margin-bottom: 0;
      color: #fff;
    }
</style>

<div class="content-wrapper">
  <main>
    <?php foreach ($results as $index => $article): ?>
        <div class="article<?= ($index + 1) % 4 === 0 ? ' last-in-row' : ''; ?>">
            <?php
                $fotoData = $article['foto'];
                $fotoBase64 = base64_encode($fotoData);
                $fotoSrc = 'data:image/jpeg;base64,' . $fotoBase64;
                $precioFormateado = number_format($article['precio'], 0, ',', '.');
            ?>
            <a href="<?= base_url('VentaSouvenirsController/detalleProducto/' . $article['id']); ?>" target="_self" class="article-link">
                <div class="article-image-container">
                    <img class="article-image" src="<?= $fotoSrc; ?>" alt="<?= $article['producto']; ?>">
                </div>
                <h3 class="article-title"><?= $article['producto']; ?></h3>
                <p class="article-price">Precio: $<?= $precioFormateado; ?></p>
            </a>
        </div>
    <?php endforeach; ?>
  </main>

<a href="<?= base_url('VentaSouvenirsController/mostrarCarro'); ?>" class="floating-button" title="Ver Carro de Compras">
    <i class="fas fa-shopping-cart"></i>
</a>

<style>
    .article {
        display: inline-block;
        width: calc(23% - 20px); /* 25% para 4 columnas, 20px de margen */
        text-align: center;
        margin: 10px;
        vertical-align: top;
    }

    .last-in-row {
        margin-right: 0;
    }

    .article-image-container {
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .article-image {
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .article-image-container:hover .article-image {
        transform: scale(1.1); /* Efecto de escala al pasar el cursor sobre la imagen */
    }

    .article-title {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .article-price {
        font-size: 14px;
        color: #888;
    }

    /* Estilos para los enlaces */
    .article-link {
        text-decoration: none; /* Eliminar subrayado */
        color: inherit; /* Heredar el color del texto */
    }

    /* Estilos para el botón flotante */
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
