<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

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

<h2>Pago de sueldo jugadores</h2>
<form action="<?= base_url('EgresoController/registrarPagoJugadores') ?>" method="post">
    <!-- Resto del formulario -->
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
            <!-- Aquí van los jugadores -->
        </select>
    </div>

    <div class="form-group" id="MontoContainer" style="display: none;">
        <label for="monto">Monto</label>
        <input type="text" class="form-control" id="monto" name="monto" readonly>
    </div>

    <!-- Aquí van los demás campos del formulario -->

    <button type="submit" class="btn btn-primary">Pagar Sueldo</button>
</form>

<script>
    const JugadorContainer = document.getElementById('JugadorContainer');
    const MontoContainer = document.getElementById('MontoContainer');
    const montoInput = document.getElementById('monto');

    const jugadorGeneros = <?= json_encode($jugadorGeneros) ?>;

    document.getElementById('genero').addEventListener('change', (event) => {
        const generoSeleccionado = event.target.value;
        const jugadores = jugadorGeneros[generoSeleccionado];

        // Llenar la combobox de jugadores
        const jugadorSelect = document.getElementById('jugador_id');
        jugadorSelect.innerHTML = ''; // Limpiar opciones anteriores

        jugadores.forEach((jugador) => {
            const option = document.createElement('option');
            option.value = jugador.nombre_jugador;
            option.text = jugador.nombre_jugador;
            jugadorSelect.appendChild(option);
        });

        JugadorContainer.style.display = 'block';
        MontoContainer.style.display = 'block';
    });

    document.getElementById('jugador_id').addEventListener('change', (event) => {
        const jugadorSeleccionado = event.target.value;
        const jugadores = jugadorGeneros['masculino'].concat(jugadorGeneros['femenino']);
        const jugadorSueldos = {};

        jugadores.forEach((jugador) => {
            jugadorSueldos[jugador.nombre_jugador] = jugador.sueldo;
        });

        // Obtener el sueldo del jugador seleccionado
        const sueldoJugador = jugadorSueldos[jugadorSeleccionado];

        // Rellenar el campo de monto con el sueldo del jugador
        montoInput.value = sueldoJugador;
    });
</script>


<?= $this->endSection() ?>

