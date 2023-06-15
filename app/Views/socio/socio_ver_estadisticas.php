<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

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
                    <td><?= $masculino['nombre'] ?></td>
                    <td><?= $masculino['apellido'] ?></td>
                    <td><?= $masculino['posicion'] ?></td>
                    <td><?= $masculino['goles'] ?></td>
                    <td><?= $masculino['jugador_lesionado'] ?></td>
                    <td><?= $masculino['fecha_inicio_lesion'] ?></td>
                    <td><?= $masculino['fecha_fin_lesion'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane fade" id="femenino" role="tabpanel" aria-labelledby="femenino-tab">
        <div class="container-fluid">
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
                    <td><?= $femenino['nombre'] ?></td>
                    <td><?= $femenino['apellido'] ?></td>
                    <td><?= $femenino['posicion'] ?></td>
                    <td><?= $femenino['goles'] ?></td>
                    <td><?= $femenino['jugador_lesionado'] ?></td>
                    <td><?= $femenino['fecha_inicio_lesion'] ?></td>
                    <td><?= $femenino['fecha_fin_lesion'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>