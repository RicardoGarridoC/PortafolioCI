<?= $this->extend('layout/jugador_template') ?>

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

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="masculino-tab" data-bs-toggle="tab" href="#masculino" role="tab" aria-controls="masculino" aria-selected="true">Masculino</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="femenino-tab" data-bs-toggle="tab" href="#femenino" role="tab" aria-controls="femenino" aria-selected="false">Femenino</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="masculino" role="tabpanel" aria-labelledby="masculino-tab">
    <div class="container-fluid">
      <div class="table-responsive">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Posicion</th>
              <th>Goles</th>
              <th>Lesion?</th>
              <th>Fecha Inicio Lesion</th>
              <th>Fecha Fin Lesion</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($masculinos as $masculino) { ?>
              <tr>
                <td data-label="Nombre"><?= $masculino['nombre'] ?></td>
                <td data-label="Apellido"><?= $masculino['apellido'] ?></td>
                <td data-label="Posicion"><?= $masculino['posicion'] ?></td>
                <td data-label="Goles"><?= $masculino['goles'] ?></td>
                <td data-label="Lesion?"><?= $masculino['jugador_lesionado'] ?></td>
                <td data-label="Fecha Inicio Lesion"><?= $masculino['fecha_inicio_lesion'] ?></td>
                <td data-label="Fecha Fin Lesion"><?= $masculino['fecha_fin_lesion'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="femenino" role="tabpanel" aria-labelledby="femenino-tab">
    <div class="container-fluid">
      <div class="table-responsive">
        <table id="example2" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Posicion</th>
              <th>Goles</th>
              <th>Lesion?</th>
              <th>Fecha Inicio Lesion</th>
              <th>Fecha Fin Lesion</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($femeninos as $femenino) { ?>
              <tr>
                <td data-label="Nombre"><?= $femenino['nombre'] ?></td>
                <td data-label="Apellido"><?= $femenino['apellido'] ?></td>
                <td data-label="Posicion"><?= $femenino['posicion'] ?></td>
                <td data-label="Goles"><?= $femenino['goles'] ?></td>
                <td data-label="Lesion?"><?= $femenino['jugador_lesionado'] ?></td>
                <td data-label="Fecha Inicio Lesion"><?= $femenino['fecha_inicio_lesion'] ?></td>
                <td data-label="Fecha Fin Lesion"><?= $femenino['fecha_fin_lesion'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>