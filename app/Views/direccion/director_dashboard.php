<?= $this->extend('layout/direccion_template') ?>
<?= $this->section('direccion_contenido') ?>

<style>
    
    body {
        background-color: #333; 
    }

    .table-container {
        background-color: #f0f2f0; 
        padding: 20px; 
        border-radius: 10px;
    }
</style>

<br>
<div class="table-container">
    <h2 class="text-center">Total Haberes</h2>
    <div class="row justify-content-center">
    <div class="col-6">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Cantidad de Ingresos</th>
            <th>Cantidad de Egresos</th>
            <th>Total $</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($totaltodo as $tt): ?>
            <tr>
            <td><?php echo $tt['total_ingresos']; ?></td>
            <td><?php echo $tt['total_egresos']; ?></td>
            <td><?php echo $tt['diferencia_monto']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Concepto</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Detalle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($totalhaberes as $total): ?>
                <tr>
                    <td><?php echo $total['concepto']; ?></td>
                    <td><?php echo $total['monto']; ?></td>
                    <td><?php echo $total['fecha']; ?></td>
                    <td><?php echo $total['detalle']; ?></td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<br>

<?= $this->endSection() ?>