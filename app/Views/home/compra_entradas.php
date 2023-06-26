<title><?= $title ?></title>
<style>
    body {
        background-color: #333;
        color: #fff;
        font-family: Arial, sans-serif;
        padding: 0;
        margin: 0;
    }
    
    .partido-info {
        margin-top: 20px;
        padding: 20px;
        border-radius: 5px;
        background-color: #444;
    }
    .confirmar-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        display: inline-block;
        margin-top: 20px;
    }
    select {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-bottom: 20px;
        background: #555;
        color: white;
    }
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        background-color: #111;
        color: white;
        padding: 20px;
    }
</style>
<div class="container">
    <h1><?= $title ?></h1>
    
    <?php if (count($results) === 0): ?>
        <p>No hay partidos próximos.</p>
    <?php elseif (count($results) === 1): ?>
        <?php $partido = $results[0]; ?>
        <div class="partido-info">
            <h2><?= $partido['nombre_equipo_local']; ?> vs <?= $partido['nombre_equipo_visita']; ?></h2>
            <p><?= $partido['fecha']; ?></p>
            <p>Tipo partido: <?= $partido['campeonato']; ?></p>
            <p>Cancha: <?= $partido['nombre_cancha']; ?></p>
            <p>Ubicación: <?= $partido['ubicacion']; ?></p>
            <p>Valor: $5.000</p>
            <button class="confirmar-button">Confirmar</button>
        </div>
    <?php else: ?>
        <select id="partido-selector">
            <option value="">Seleccionar partido</option>
            <?php foreach ($results as $index => $partido): ?>
                <option value="partido-<?= $index; ?>"><?= $partido['nombre_equipo_local']; ?> vs <?= $partido['nombre_equipo_visita']; ?> | <?= $partido['fecha']; ?></option>
            <?php endforeach; ?>
        </select>
        
        <?php foreach ($results as $index => $partido): ?>
            <div class="partido-info" id="partido-<?= $index; ?>" style="display: none;">
                <h2><?= $partido['nombre_equipo_local']; ?> vs <?= $partido['nombre_equipo_visita']; ?></h2>
                <p><?= $partido['fecha']; ?></p>
                <p>Tipo partido: <?= $partido['campeonato']; ?></p>
                <p>Cancha: <?= $partido['nombre_cancha']; ?></p>
                <p>Ubicación: <?= $partido['ubicacion']; ?></p>
                <p>Valor: $5.000</p>
                <button class="confirmar-button">Confirmar</button>
            </div>
        <?php endforeach; ?>
        
        <script>
            let selector = document.getElementById('partido-selector');
            let partidos = document.querySelectorAll('.partido-info');
            let buttons = document.querySelectorAll('.confirmar-button');

            selector.addEventListener('change', function() {
                let selectedId = this.value;
                
                partidos.forEach(function(partido) {
                    if (partido.id === selectedId) {
                        partido.style.display = 'block';
                    } else {
                        partido.style.display = 'none';
                    }
                });
            });
            
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    alert('Has confirmado la compra para el partido: ' + button.parentElement.querySelector('h2').textContent);
                });
            });
        </script>
    <?php endif; ?>
</div>
