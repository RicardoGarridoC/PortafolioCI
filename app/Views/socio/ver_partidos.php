<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

<!--Colocar Contenido Aqui-->
<div class="container">
    <h1>Historial de partidos</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Equipo</th>
          <th>Contrincante</th>
          <th>Goles</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        <tr data-toggle="collapse" data-target="#detalle-1" aria-expanded="false" aria-controls="detalle-1">
          <td><img src="" alt="Logo equipo" width="20" height="20"> Equipo A</td>
          <td><img src="" alt="Logo equipo" width="20" height="20"> Equipo B</td>
          <td>3 - 2</td>
          <td>01/06/2023</td>
        </tr>
        <tr id="detalle-1" class="collapse">
          <td colspan="4">
            <table class="table">
              <thead>
                <tr>
                  <th>Jugador</th>
                  <th>Minuto</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Jugador A</td>
                  <td>15'</td>
                </tr>
                <tr>
                  <td>Jugador B</td>
                  <td>30'</td>
                </tr>
                <tr>
                  <td>Jugador C</td>
                  <td>75'</td>
                </tr>
                <tr>
                  <td>Jugador D</td>
                  <td>87'</td>
                </tr>
                <tr>
                  <td>Jugador E</td>
                  <td>90+'</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Añade más filas para otros partidos -->
      </tbody>
    </table>
  </div>
  

<?= $this->endSection() ?>



