<?= $this->extend('layout/equipotecnico_template') ?>

<?= $this->section('contenido') ?>
<style>
  .table-responsive {
    overflow-x: auto;
  }

  @media (max-width: 767px) {
    .table-responsive table {
      display: block;
      width: 100%;
      overflow: auto;
      -webkit-overflow-scrolling: touch;
      border-spacing: 0;
      border-collapse: collapse;
    }

    .table-responsive table thead,
    .table-responsive table tbody,
    .table-responsive table th,
    .table-responsive table td,
    .table-responsive table tr {
      display: block;
    }

    .table-responsive table thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    .table-responsive table tr {
      border: 1px solid #ccc;
    }

    .table-responsive table td,
    .table-responsive table th {
      display: block;
      width: auto !important;
      border: none;
      padding: 8px;
    }

    .table-responsive table td:before,
    .table-responsive table th:before {
      content: attr(data-label);
      font-weight: bold;
      display: inline-block;
      width: 120px;
      text-align: left;
    }
  }
</style>

<section class="content">
  <div class="container-fluid">
    <div class="table-responsive">
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
              <td data-label="Fecha"><?= $partido['fecha'] ?></td>
              <td data-label="Equipos"><?= $partido['equipos'] ?></td>
              <td data-label="Resultado"><?= $partido['resultado'] ?></td>
              <td data-label="Goles Local"><?= $partido['goles_jugadores_local'] ?></td>
              <td data-label="Goles Visita"><?= $partido['goles_jugadores_visita'] ?></td>
              <td data-label="Cambios Local"><?= $partido['cambios_local'] ?></td>
              <td data-label="Cambios Visita"><?= $partido['cambios_visita'] ?></td>
              <td data-label="Tarjetas Local"><?= $partido['tarjetas_local'] ?></td>
              <td data-label="Tarjetas Visita"><?= $partido['tarjetas_visita'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?= $this->endSection() ?>