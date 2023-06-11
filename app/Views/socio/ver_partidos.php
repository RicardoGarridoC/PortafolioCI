<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

<section class="content">
  <div class="container-fluid">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Equipo Local</th>
          <th>Goles Total Local</th>
          <th>Equipo Visita</th>
          <th>Goles Total Visita</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results1 as $row1) : ?>
          <tr class="partido-row" data-partido-id="<?php echo $row1['partido_id']; ?>">
            <td><?php echo $row1['partido_id']; ?></td>
            <td><?php echo $row1['equipo_local']; ?></td>
            <td><?php echo $row1['goles_equipo_local']; ?></td>
            <td><?php echo $row1['equipo_visita']; ?></td>
            <td><?php echo $row1['goles_equipo_visita']; ?></td>
            <td><?php echo $row1['fecha']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Equipo Local</th>
          <th>Goles Total Local</th>
          <th>Equipo Visita</th>
          <th>Goles Total Visita</th>
          <th>Fecha</th>
        </tr>
      </tfoot>
    </table>
    
    <!-- TABS -->
    <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
        <li class="nav-item flex-fill">
            <a class="nav-link active text-center" id="goles-tab" data-bs-toggle="tab" href="#goles" role="tab" aria-controls="goles" aria-selected="true">Goles</a>
        </li>
        <li class="nav-item flex-fill">
            <a class="nav-link text-center" id="cambios-tab" data-bs-toggle="tab" href="#cambios" role="tab" aria-controls="cambios" aria-selected="false">Cambios</a>
        </li>
        <li class="nav-item flex-fill">
            <a class="nav-link text-center" id="tarjetas-tab" data-bs-toggle="tab" href="#tarjetas" role="tab" aria-controls="tarjetas" aria-selected="false">Tarjetas</a>
        </li>
    </ul>
    
    <div class="tab-content" id="myTabContent">
        <!-- GOLES-->
        <div class="tab-pane fade show active" id="goles" role="tabpanel" aria-labelledby="goles-tab">
            <div class="row">
                <div class="col-6">
                    <ul class="text-start smaller-text">
                        <?php foreach ($results2 as $row2) : ?>
                            <li><?php echo $row2['nombre_jugador']; ?> <?php echo $row2['minuto_gol']; ?>"</li>
                            <hr>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="text-end smaller-text">
                        <?php foreach ($results3 as $row3) : ?>
                            <li><?php echo $row3['nombre_jugador']; ?> <?php echo $row3['minuto_gol']; ?>"</li>
                            <hr>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- CAMBIOS -->
        <div class="tab-pane fade" id="cambios" role="tabpanel" aria-labelledby="cambios-tab">
            <div class="row">
                <div class="col-6">
                    <ul class="text-start smaller-text">
                        <?php foreach ($results4 as $row4) : ?>
                            <li><?php echo $row4['jugador_saliente']; ?> -> <?php echo $row4['jugador_entrante']; ?> <?php echo $row4['minuto']; ?>"</li>
                            <hr>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="text-end smaller-text">
                        <?php foreach ($results5 as $row5) : ?>
                            <li><?php echo $row5['jugador_saliente']; ?> -> <?php echo $row5['jugador_entrante']; ?> <?php echo $row5['minuto']; ?>"</li>
                            <hr>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- TARJETAS -->
        <div class="tab-pane fade" id="tarjetas" role="tabpanel" aria-labelledby="tarjetas-tab">
            <div class="row">
                <div class="col-6">
                    <ul class="text-start smaller-text">
                        <?php foreach ($results6 as $row6) : ?>
                            <li><?php echo $row6['jugador']; ?> Tarjeta <?php echo $row6['tarjeta']; ?> <?php echo $row6['minuto']; ?>"</li>
                            <hr>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="text-end smaller-text">
                        <?php foreach ($results7 as $row7) : ?>
                            <li><?php echo $row7['jugador']; ?> Tarjeta <?php echo $row7['tarjeta']; ?> <?php echo $row7['minuto']; ?>"</li>
                            <hr>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

  </div>
</section>


<?= $this->endSection() ?>
