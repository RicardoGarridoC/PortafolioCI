<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<form id="form-gol">
    <label for="partidos">Selecciona un partido:</label>
    <select name="partidos" id="partidos">
        <option value="">Selecciona un partido</option>
        <?php foreach($partidos as $partido): ?>
            <option value="<?= $partido->id ?>"
                    data-equipo-local="<?= $partido->equipo_local ?>"
                    data-equipo-visita="<?= $partido->equipo_visita_fk ?>"
                    data-genero-equipo-local="<?= $partido->genero_equipo_local ?>">
                <?= $partido->equipo_local ?> vs <?= $partido->equipo_visita_fk ?> | <?= $partido->fecha ?>
            </option>
        <?php endforeach; ?>
    </select>

    <div id="section-goles" style="display: none;">
        <h2>Agregar goles</h2>

        <label for="equipo">Selecciona el equipo:</label>
        <select name="equipo" id="equipo">
            <option value="">Selecciona un equipo</option>
            <!-- Aquí se agregarán las opciones de equipos con JavaScript -->
        </select>

        <div id="section-jugador" style="display: none;">
            <label for="jugador">Selecciona el jugador:</label>
            <select name="jugador" id="jugador">
                <option value="">Selecciona un jugador</option>
                <!-- Aquí se agregarán las opciones de jugadores con AJAX y JavaScript -->
            </select>
        </div>

        <div id="section-nombre" style="display: none;">
            <label for="nombre">Nombre del jugador:</label>
            <input type="text" name="nombre" id="nombre">
        </div>

        <label for="minuto">Minuto del gol:</label>
        <input type="text" name="minuto" id="minuto">

        <button type="button" id="agregar-gol">Agregar gol</button>
    </div>
</form>
<!-- cambios -->
<div id="section-cambios" style="display: none;">
    <h2>Agregar cambios</h2>

    <label for="equipo-cambio">Selecciona el equipo:</label>
    <select name="equipo-cambio" id="equipo-cambio">
        <option value="">Selecciona un equipo</option>
        <!-- Aquí se agregarán las opciones de equipos con JavaScript -->
    </select>

    <div id="section-cambio-local" style="display: none;">
        <label for="jugador-saliendo">Selecciona el jugador saliente:</label>
        <select name="jugador-saliendo" id="jugador-saliendo">
            <option value="">Selecciona un jugador</option>
            <!-- Aquí se agregarán las opciones de jugadores con AJAX y JavaScript -->
        </select>

        <label for="jugador-entrante">Selecciona el jugador entrante:</label>
        <select name="jugador-entrante" id="jugador-entrante">
            <option value="">Selecciona un jugador</option>
            <!-- Aquí se agregarán las opciones de jugadores con AJAX y JavaScript -->
        </select>
    </div>

    <div id="section-cambio-visita" style="display: none;">
        <label for="jugador-saliendo-visita">Nombre del jugador saliente:</label>
        <input type="text" name="jugador-saliendo-visita" id="jugador-saliendo-visita">

        <label for="jugador-entrante-visita">Nombre del jugador entrante:</label>
        <input type="text" name="jugador-entrante-visita" id="jugador-entrante-visita">
    </div>

    <label for="minuto-cambio">Minuto del cambio:</label>
    <input type="text" name="minuto-cambio" id="minuto-cambio">

    <button type="button" id="agregar-cambio">Agregar cambio</button>
</div>
<!-- tarjetas -->
<div id="section-tarjeta" style="display: none;">
        <h2>Agregar Tarjetas</h2>

        <label for="equipo-tarjeta">Selecciona el equipo:</label>
        <select name="equipo-tarjeta" id="equipo-tarjeta">
            <option value="">Selecciona un equipo</option>
            <!-- Aquí se agregarán las opciones de equipos con JavaScript -->
        </select>

        <div id="section-jugador-tarjeta" style="display: none;">
            <label for="jugador-tarjeta">Selecciona el jugador:</label>
            <select name="jugador-tarjeta" id="jugador-tarjeta">
                <option value="">Selecciona un jugador</option>
                <!-- Aquí se agregarán las opciones de jugadores con AJAX y JavaScript -->
            </select>
        </div>

        <div id="section-nombre-tarjeta" style="display: none;">
            <label for="nombre">Nombre del jugador:</label>
            <input type="text" name="nombre" id="nombre">
        </div>

        <label for="minuto-tarjeta">Minuto de tarjeta:</label>
        <input type="text" name="minuto-tarjeta" id="minuto-tarjeta">

        <div id="section-tarjeta-tarjeta" style="display: none;">
            <label for="tarjeta">Selecciona el jugador:</label>
            <select name="tarjeta" id="tarjeta">
                <option value="">Seleccione una tarjeta</option>
                <option value="amarilla">Amarilla</option>
                <option value="roja">Roja</option>
            </select>
        </div>


        <button type="button" id="agregar-tarjeta">Agregar tarjeta</button>
    </div>
</form>



<script>
// Asegúrate de ajustar estas URLs a tu caso particular.
const urlJugadores = '<?= site_url('PartidoEnVivoController/obtenerJugadores') ?>';
const urlAgregarGol = '<?= site_url('PartidoEnVivoController/agregarGol') ?>';

document.getElementById('partidos').addEventListener('change', function() {
    let sectionGoles = document.getElementById('section-goles');
    let selectEquipo = document.getElementById('equipo');

    // Limpiar las opciones del select de equipos
    selectEquipo.innerHTML = '<option value="">Selecciona un equipo</option>';

    if (this.value) {
        sectionGoles.style.display = 'block';

        // Obtener la opción seleccionada
        let selectedOption = this.options[this.selectedIndex];

        // Agregar los equipos a las opciones del select de equipos
        selectEquipo.innerHTML += `<option value="local">${selectedOption.dataset.equipoLocal}</option>`;
        selectEquipo.innerHTML += `<option value="visita">${selectedOption.dataset.equipoVisita}</option>`;

        // Guardar el género del equipo local en el select de equipos
        selectEquipo.dataset.generoEquipoLocal = selectedOption.dataset.generoEquipoLocal;
    } else {
        sectionGoles.style.display = 'none';
    }
});

document.getElementById('equipo').addEventListener('change', function() {
    let sectionJugador = document.getElementById('section-jugador');
    let sectionNombre = document.getElementById('section-nombre');

    if (this.value === 'local') {
        sectionJugador.style.display = 'block';
        sectionNombre.style.display = 'none';

        // Obtener los jugadores del equipo local con AJAX
        fetch(`${urlJugadores}/${this.dataset.generoEquipoLocal}`)
            .then(response => response.json())
            .then(data => {
                // Limpiar las opciones del select de jugadores
                let selectJugador = document.getElementById('jugador');
                selectJugador.innerHTML = '<option value="">Selecciona un jugador</option>';

                // Agregar los jugadores a las opciones del select de jugadores
                data.forEach(jugador => {
                    selectJugador.innerHTML += `<option value="${jugador.id}">${jugador.numero_camiseta} | ${jugador.nombre_jugador}</option>`;
                });
            });
    } else if (this.value === 'visita') {
        sectionJugador.style.display = 'none';
        sectionNombre.style.display = 'block';
    } else {
        sectionJugador.style.display = 'none';
        sectionNombre.style.display = 'none';
    }
});

document.getElementById('agregar-gol').addEventListener('click', function(e) {
    e.preventDefault();

    let partidoId = document.getElementById('partidos').value;
    let equipo = document.getElementById('equipo').value;
    let minuto = document.getElementById('minuto').value;

    let golData = {
        partido_id_fk: partidoId,
        minuto: minuto,
    };

    if (equipo === 'local') {
        let jugadorId = document.getElementById('jugador').value;
        golData.jugador_id_fk = jugadorId;
    } else if (equipo === 'visita') {
        let nombre = document.getElementById('nombre').value;
        golData.jugador_visita = nombre;
    }

    fetch(urlAgregarGol, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(golData),
    })
    .then(response => {
        if (response.status === 200) {
            alert('Gol agregado exitosamente');
            // Limpiar los campos del formulario
            document.getElementById('partidos').value = '';
            document.getElementById('equipo').innerHTML = '<option value="">Selecciona un equipo</option>';
            document.getElementById('jugador').innerHTML = '<option value="">Selecciona un jugador</option>';
            document.getElementById('nombre').value = '';
            document.getElementById('minuto').value = '';
            document.getElementById('section-goles').style.display = 'none';
            document.getElementById('section-cambios').style.display = 'none';
        } else {
            alert('Error al agregar gol');
        }
    });
});

//cambios
const urlAgregarCambio = '<?= site_url('PartidoEnVivoController/agregarCambio') ?>';
const urlJugadoresExcluyendo = '<?= site_url('PartidoEnVivoController/obtenerJugadoresExcluyendo') ?>';

document.getElementById('partidos').addEventListener('change', function() {
    let sectionCambios = document.getElementById('section-cambios');
    let selectEquipoCambio = document.getElementById('equipo-cambio');

    // Limpiar las opciones del select de equipos
    selectEquipoCambio.innerHTML = '<option value="">Selecciona un equipo</option>';

    if (this.value) {
        sectionCambios.style.display = 'block';

        // Obtener la opción seleccionada
        let selectedOption = this.options[this.selectedIndex];

        // Agregar los equipos a las opciones del select de equipos
        selectEquipoCambio.innerHTML += `<option value="local">${selectedOption.dataset.equipoLocal}</option>`;
        selectEquipoCambio.innerHTML += `<option value="visita">${selectedOption.dataset.equipoVisita}</option>`;

        // Guardar el género del equipo local en el select de equipos
        selectEquipoCambio.dataset.generoEquipoLocal = selectedOption.dataset.generoEquipoLocal;
    } else {
        sectionCambios.style.display = 'none';
    }
});
document.getElementById('equipo-cambio').addEventListener('change', function() {
    let sectionCambioLocal = document.getElementById('section-cambio-local');
    let sectionCambioVisita = document.getElementById('section-cambio-visita');

    if (this.value === 'local') {
        sectionCambioLocal.style.display = 'block';
        sectionCambioVisita.style.display = 'none';

        // Obtener los jugadores del equipo local con AJAX
        fetch(`${urlJugadores}/${this.dataset.generoEquipoLocal}`)
            .then(response => response.json())
            .then(data => {
                // Limpiar las opciones del select de jugadores salientes
                let selectJugadorSaliendo = document.getElementById('jugador-saliendo');
                selectJugadorSaliendo.innerHTML = '<option value="">Selecciona un jugador</option>';

                // Agregar los jugadores a las opciones del select de jugadores salientes
                data.forEach(jugador => {
                    selectJugadorSaliendo.innerHTML += `<option value="${jugador.id}">${jugador.numero_camiseta} | ${jugador.nombre_jugador}</option>`;
                });
            });
    } else if (this.value === 'visita') {
        sectionCambioLocal.style.display = 'none';
        sectionCambioVisita.style.display = 'block';
    } else {
        sectionCambioLocal.style.display = 'none';
        sectionCambioVisita.style.display = 'none';
    }
});

document.getElementById('jugador-saliendo').addEventListener('change', function() {
    let selectEquipoCambio = document.getElementById('equipo-cambio');

    if (selectEquipoCambio.value === 'local') {
        // Obtener los jugadores del equipo local con AJAX, excluyendo el jugador saliente
        fetch(`${urlJugadoresExcluyendo}/${selectEquipoCambio.dataset.generoEquipoLocal}/${this.value}`)
            .then(response => response.json())
            .then(data => {
                // Limpiar las opciones del select de jugadores entrantes
                let selectJugadorEntrante = document.getElementById('jugador-entrante');
                selectJugadorEntrante.innerHTML = '<option value="">Selecciona un jugador</option>';

                // Agregar los jugadores a las opciones del select de jugadores entrantes
                data.forEach(jugador => {
                    selectJugadorEntrante.innerHTML += `<option value="${jugador.id}">${jugador.numero_camiseta} | ${jugador.nombre_jugador}</option>`;
                });
            });
    }
});

document.getElementById('agregar-cambio').addEventListener('click', function(e) {
    e.preventDefault();

    let partidoId = document.getElementById('partidos').value;
    let equipoCambio = document.getElementById('equipo-cambio').value;
    let minutoCambio = document.getElementById('minuto-cambio').value;

    let cambioData = {
        partido_id_fk: partidoId,
        minuto: minutoCambio,
    };

    if (equipoCambio === 'local') {
        let jugadorSaliendoId = document.getElementById('jugador-saliendo').value;
        let jugadorEntranteId = document.getElementById('jugador-entrante').value;
        cambioData.jugador_saliendo_id_fk = jugadorSaliendoId;
        cambioData.jugador_entrante_id_fk = jugadorEntranteId;
    } else if (equipoCambio === 'visita') {
        let jugadorSaliendoVisita = document.getElementById('jugador-saliendo-visita').value;
        let jugadorEntranteVisita = document.getElementById('jugador-entrante-visita').value;
        cambioData.jugador_saliendo_visita = jugadorSaliendoVisita;
        cambioData.jugador_entrante_visita = jugadorEntranteVisita;
    }

    fetch(urlAgregarCambio, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(cambioData),
    })
    .then(response => {
        if (response.status === 200) {
            alert('Cambio agregado exitosamente');
            // Limpiar los campos del formulario
            document.getElementById('partidos').value = '';
            document.getElementById('equipo-tarjeta').innerHTML = '<option value="">Selecciona un equipo</option>';
            document.getElementById('jugador-saliendo').innerHTML = '<option value="">Selecciona un jugador</option>';
            document.getElementById('jugador-entrante').innerHTML = '<option value="">Selecciona un jugador</option>';
            document.getElementById('jugador-saliendo-visita').value = '';
            document.getElementById('jugador-entrante-visita').value = '';
            document.getElementById('minuto-cambio').value = '';
            document.getElementById('section-goles').style.display = 'none';
            document.getElementById('section-cambios').style.display = 'none';
        } else {
            alert('Error al agregar cambio');
        }
    });
});
// tarjetas
const urlJugadoresTarjeta = '<?= site_url('PartidoEnVivoController/obtenerJugadoresTarjeta') ?>';
const urlAgregarTarjeta = '<?= site_url('PartidoEnVivoController/agregarTarjeta') ?>';

document.getElementById('partidos').addEventListener('change', function() {
    let sectionTarjeta = document.getElementById('section-tarjeta');
    let selectEquipo = document.getElementById('equipo-tarjeta');

    // Limpiar las opciones del select de equipos
    selectEquipo.innerHTML = '<option value="">Selecciona un equipo</option>';

    if (this.value) {
        sectionTarjeta.style.display = 'block';

        // Obtener la opción seleccionada
        let selectedOption = this.options[this.selectedIndex];

        // Agregar los equipos a las opciones del select de equipos
        selectEquipo.innerHTML += `<option value="local">${selectedOption.dataset.equipoLocal}</option>`;
        selectEquipo.innerHTML += `<option value="visita">${selectedOption.dataset.equipoVisita}</option>`;

        // Guardar el género del equipo local en el select de equipos
        selectEquipo.dataset.generoEquipoLocal = selectedOption.dataset.generoEquipoLocal;
    } else {
        sectionTarjeta.style.display = 'none';
    }
});

document.getElementById('equipo-tarjeta').addEventListener('change', function() {
    let sectionJugador = document.getElementById('section-jugador-tarjeta');
    let sectionNombre = document.getElementById('section-nombre-tarjeta');
    let sectionTtarjeta = document.getElementById('section-tarjeta-tarjeta');

    if (this.value === 'local') {
        sectionJugador.style.display = 'block';
        sectionNombre.style.display = 'none';
        sectionTtarjeta.style.display = 'block';

        // Obtener los jugadores del equipo local con AJAX
        fetch(`${urlJugadores}/${this.dataset.generoEquipoLocal}`)
            .then(response => response.json())
            .then(data => {
                // Limpiar las opciones del select de jugadores
                let selectJugador = document.getElementById('jugador-tarjeta');
                selectJugador.innerHTML = '<option value="">Selecciona un jugador</option>';

                // Agregar los jugadores a las opciones del select de jugadores
                data.forEach(jugador => {
                    selectJugador.innerHTML += `<option value="${jugador.id}">${jugador.numero_camiseta} | ${jugador.nombre_jugador}</option>`;
                });
            });
    } else if (this.value === 'visita') {
        sectionJugador.style.display = 'none';
        sectionNombre.style.display = 'block';
        sectionTtarjeta.style.display = 'block';
    } else {
        sectionJugador.style.display = 'none';
        sectionNombre.style.display = 'none';
    }
});

document.getElementById('agregar-tarjeta').addEventListener('click', function(e) {
    e.preventDefault();

    let partidoId = document.getElementById('partidos').value;
    let equipo = document.getElementById('equipo-tarjeta').value;
    let minuto = document.getElementById('minuto-tarjeta').value;
    let tarjeta = document.getElementById('tarjeta').value;

    let tarjetaData = {
        partido_id_fk: partidoId,
        minuto: minuto,
        tarjeta: tarjeta,
    };

    if (equipo === 'local') {
        let jugadorId = document.getElementById('jugador-tarjeta').value;
        tarjetaData.jugador_id_fk = jugadorId;
    } else if (equipo === 'visita') {
        let nombre = document.getElementById('nombre-tarjeta').value;
        tarjetaData.jugador_visita = nombre;
    }

    fetch(urlAgregarTarjeta, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(tarjetaData),
    })
    .then(response => {
        if (response.status === 200) {
            alert('Tarjeta agregado exitosamente');
            // Limpiar los campos del formulario
            document.getElementById('partidos').value = '';
            document.getElementById('equipo-tarjeta').innerHTML = '<option value="">Selecciona un equipo</option>';
            document.getElementById('jugador-tarjeta').innerHTML = '<option value="">Selecciona un jugador</option>';
            document.getElementById('nombre-tarjeta').value = '';
            document.getElementById('minuto-tarjeta').value = '';
            document.getElementById('tarjeta').innerHTML = '<option value="">Seleccione una tarjeta</option>';
            document.getElementById('section-goles').style.display = 'none';
            document.getElementById('section-cambios').style.display = 'none';
            document.getElementById('section-tarjeta').style.display = 'none';
        } else {
            alert('Error al agregar tarjeta');
        }
    });
});
</script>
<?= $this->endSection() ?>