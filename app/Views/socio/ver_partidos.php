<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

<section class="content">
  <div class="container-fluid">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Equipos</th>
          <th>Resultado</th>
          <th>Goles Local</th>
          <th>Goles Visita</th>
          <th>Cambios Local</th>
          <th>Cambios Visita</th>
          <th>Tarjetas Local</th>
          <th>Tarjetas Visita</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($partidos as $partido) { ?>
          <tr>
            <td><?= $partido['fecha'] ?></td>
            <td><?= $partido['equipos'] ?></td>
            <td><?= $partido['resultado'] ?></td>
            <td><?= $partido['goles_jugadores_local'] ?></td>
            <td><?= $partido['goles_jugadores_visita'] ?></td>
            <td><?= $partido['cambios_local'] ?></td>
            <td><?= $partido['cambios_visita'] ?></td>
            <td><?= $partido['tarjetas_local'] ?></td>
            <td><?= $partido['tarjetas_visita'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th>Fecha</th>
          <th>Equipos</th>
          <th>Resultado</th>
          <th>Goles Local</th>
          <th>Goles Visita</th>
          <th>Cambios Local</th>
          <th>Cambios Visita</th>
          <th>Tarjetas Local</th>
          <th>Tarjetas Visita</th>
        </tr>
      </tfoot>
    </table>
  </div>
</section>
<?= $this->endSection() ?>
