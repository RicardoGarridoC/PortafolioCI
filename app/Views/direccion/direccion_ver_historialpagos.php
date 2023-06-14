<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>

<div>
    <h2 class="text-center">Historial Pago Socios</h2>
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Concepto</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Detalle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagos as $pago): ?>
                <tr>
                    <td><?php echo $pago['nombre']; ?></td>
                    <td><?php echo $pago['concepto']; ?></td>
                    <td><?php echo $pago['monto']; ?></td>
                    <td><?php echo $pago['fecha']; ?></td>
                    <td><?php echo $pago['detalle']; ?></td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ?>