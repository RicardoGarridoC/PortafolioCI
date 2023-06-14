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

<h2>Pago de sueldo dirigentes</h2>
<form action="<?= base_url('EgresoController/PagarSueldoDirigente') ?>" method="post">
    <div class="form-group">
        <label for="dirigente_id">Dirigente</label>
        <select class="form-control" id="dirigente_id" name="dirigente_id">
            <option value="">Seleccione el dirigente</option>
        </select>
    </div>

    <div class="form-group" id="SueldoContainer" style="display: none;">
        <label for="sueldo">Sueldo</label>
        <input type="text" class="form-control" id="sueldo" name="sueldo" readonly>
    </div>

    <button type="submit" class="btn btn-primary">Pagar Sueldo</button>
</form>

<script>
    const dirigentes = <?= json_encode($dirigentes) ?>;
    const dirigenteInfo = {};

    dirigentes.forEach((dirigente) => {
        const option = document.createElement('option');
        option.value = dirigente.nombre_dirigente;
        option.text = dirigente.nombre_dirigente;
        document.getElementById('dirigente_id').appendChild(option);
        dirigenteInfo[dirigente.nombre_dirigente] = {
            sueldo: dirigente.sueldo,
        };
    });

    document.getElementById('dirigente_id').addEventListener('change', (event) => {
        const dirigenteSeleccionado = event.target.value;
        const infoDirigente = dirigenteInfo[dirigenteSeleccionado];

        // Rellenar los campos con la info del dirigente
        document.getElementById('sueldo').value = infoDirigente.sueldo;

        // Mostrar los contenedores
        document.getElementById('SueldoContainer').style.display = 'block';
    });
</script>

<?= $this->endSection() ?>
