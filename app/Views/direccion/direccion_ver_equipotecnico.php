<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>


<div class="example4">
    <h2 class="text-center">Equipo Tecnico</h2>
    <table id="example4" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Equipo Proviene</th>
            <th>Sueldo</th>
            <th>Valor Hora Extra</th>
            <th>Horas Extra (Mes)</th>
            <th>Total a Pagar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($equipotecnicos as $equipotecnico) { ?>
        <tr>
            <td><?= $equipotecnico['nombre'] ?></td>
            <td><?= $equipotecnico['cargo'] ?></td>
            <td><?= $equipotecnico['equipo_proviene'] ?></td>
            <td><?= $equipotecnico['sueldo'] ?></td>
            <td><?= $equipotecnico['valor_hora_extra'] ?></td>
            <td><?= $equipotecnico['horas_extras_mes'] ?></td>
            <td><?= $equipotecnico['total_a_pagar'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    </div>
</div>

<?= $this->endSection() ?>