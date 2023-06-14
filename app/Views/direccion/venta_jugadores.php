<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>

<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= session('success') ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<script>
setTimeout(function() {
    $('.alert').alert('close');
}, 2000);
</script>
<?php endif; ?>

<h2>Venta de jugadores</h2>
<form action="<?= base_url('VentaJugadorController/registrarVentaJugadores') ?>" method="post">
    <div class="form-group">
        <label for="genero">Género</label>
        <select class="form-control" id="genero" name="genero">
            <option value="">Seleccione el género</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>
    </div>

    <div class="form-group" id="JugadorContainer" style="display: none;">
        <label for="jugador_id">Jugador</label>
        <select class="form-control" id="jugador_id" name="jugador_id">
            <option value="">Seleccione el jugador</option>
        </select>
    </div>

    <div class="form-group">
        <label for="equipo_id">Equipo</label>
        <select class="form-control" id="equipo_id" name="equipo_id">
            <option value="">Seleccione el equipo</option>
            <?php foreach($equipos as $equipo): ?>
            <option value="<?= $equipo['id'] ?>"><?= $equipo['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="monto">Monto</label>
        <input type="text" class="form-control" id="monto" name="monto">
    </div>

    <button type="submit" class="btn btn-primary">Vender Jugador</button>
</form>

<script>
    const JugadorContainer = document.getElementById('JugadorContainer');
    const jugadorGeneros = <?= json_encode($jugadorGeneros) ?>;

    document.getElementById('genero').addEventListener('change', (event) => {
        const generoSeleccionado = event.target.value;
        const jugadores = jugadorGeneros[generoSeleccionado];

        // Llenar la combobox de jugadores
        const jugadorSelect = document.getElementById('jugador_id');
        jugadorSelect.innerHTML = ''; // Limpiar opciones anteriores

        jugadores.forEach((jugador) => {
            const option = document.createElement('option');
            option.value = jugador.jugador_id;
            option.text = jugador.nombre_jugador;
            jugadorSelect.appendChild(option);
        });

        JugadorContainer.style.display = 'block';
    });
</script>

<?= $this->endSection() ?>

