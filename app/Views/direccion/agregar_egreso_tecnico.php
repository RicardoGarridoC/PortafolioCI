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

<h2>Pago de sueldo equipo técnico</h2>
<form action="<?= base_url('EgresoController/PagarSueldoEquipoTecnico') ?>" method="post">
    <div class="form-group">
        <label for="tecnico_id">Miembro del equipo técnico</label>
        <select class="form-control" id="tecnico_id" name="tecnico_id">
            <option value="">Seleccione el técnico</option>
            <!-- Aquí van los técnicos -->
        </select>
    </div>

    <div class="form-group" id="SueldoContainer" style="display: none;">
        <label for="sueldo">Sueldo</label>
        <input type="text" class="form-control" id="sueldo" name="sueldo" readonly>
    </div>

    <div class="form-group" id="HorasExtraContainer" style="display: none;">
        <label for="horas_extra">Horas Extras</label>
        <input type="text" class="form-control" id="horas_extra" name="horas_extra" readonly>
    </div>

    <div class="form-group" id="ValorHoraExtraContainer" style="display: none;">
        <label for="valor_hora_extra">Valor Hora Extra</label>
        <input type="text" class="form-control" id="valor_hora_extra" name="valor_hora_extra" readonly>
    </div>

    <div class="form-group" id="TotalHorasExtraContainer" style="display: none;">
        <label for="total_horas_extra">Total Horas Extra</label>
        <input type="text" class="form-control" id="total_horas_extra" name="total_horas_extra" readonly>
    </div>

    <div class="form-group" id="TotalPagarContainer" style="display: none;">
        <label for="total_a_pagar">Total a Pagar</label>
        <input type="text" class="form-control" id="total_a_pagar" name="total_a_pagar" readonly>
    </div>

    <button type="submit" class="btn btn-primary">Pagar Sueldo</button>
</form>

<script>
    const tecnicos = <?= json_encode($tecnicos) ?>;
    const tecnicoInfo = {};

    tecnicos.forEach((tecnico) => {
        const option = document.createElement('option');
        option.value = tecnico.nombre_tecnico;
        option.text = tecnico.nombre_tecnico;
        document.getElementById('tecnico_id').appendChild(option);
        tecnicoInfo[tecnico.nombre_tecnico] = {
            sueldo: tecnico.sueldo,
            horas_extra: tecnico.horas_extras_mes,
            valor_hora_extra: tecnico.valor_hora_extra,
            total_horas_extra: tecnico.total_horas_extra,
            total_a_pagar: tecnico.total_a_pagar
        };
    });

    document.getElementById('tecnico_id').addEventListener('change', (event) => {
        const tecnicoSeleccionado = event.target.value;
        const infoTecnico = tecnicoInfo[tecnicoSeleccionado];

        // Rellenar los campos con la info del técnico
        document.getElementById('sueldo').value = infoTecnico.sueldo;
        document.getElementById('horas_extra').value = infoTecnico.horas_extra;
        document.getElementById('valor_hora_extra').value = infoTecnico.valor_hora_extra;
        document.getElementById('total_horas_extra').value = infoTecnico.total_horas_extra;
        document.getElementById('total_a_pagar').value = infoTecnico.total_a_pagar;

        // Mostrar los contenedores
        document.getElementById('SueldoContainer').style.display = 'block';
        document.getElementById('HorasExtraContainer').style.display = 'block';
        document.getElementById('ValorHoraExtraContainer').style.display = 'block';
        document.getElementById('TotalHorasExtraContainer').style.display = 'block';
        document.getElementById('TotalPagarContainer').style.display = 'block';
    });
</script>

<?= $this->endSection() ?>





