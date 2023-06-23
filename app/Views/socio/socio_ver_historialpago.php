<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

<div>
    <h2 class="text-center">Historial de Pagos</h2>
    <table id="example1" class="table table-striped">
        <thead>
            <tr>
                <!-- <th scope="col">Concepto</th> -->
                <th scope="col">Detalle</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto</th>
                <!-- <th scope="col">ID Usuario</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagos as $pago): ?>
                <?php if ($pago['concepto'] === 'mensualidad' && $pago['id_usuario_fk'] === session('idUsuario')): ?>
                    <tr>
                        <!-- <td><?php echo $pago['concepto']; ?></td> -->
                        <td><?php echo $pago['detalle']; ?></td>
                        <td><?php echo $pago['fecha']; ?></td>
                        <td><?php echo $pago['monto']; ?></td>
                        <!-- <td><?php echo $pago['id_usuario_fk']; ?></td> -->
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ?>