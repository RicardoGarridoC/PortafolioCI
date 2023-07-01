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

    .tabla2 {
        background-color: #f0f2f0;
        border-radius: 10px;
    }

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

<br>
<div class="tabla2">
    <h2 class="text-center">Total Haberes</h2>
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th data-label="Cantidad de Ingresos">Cantidad de Ingresos</th>
                            <th data-label="Cantidad de Egresos">Cantidad de Egresos</th>
                            <th data-label="Total $">Total $</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($totaltodo as $tt): ?>
                            <tr>
                                <td data-label="Cantidad de Ingresos"><?php echo $tt['total_ingresos']; ?></td>
                                <td data-label="Cantidad de Egresos"><?php echo $tt['total_egresos']; ?></td>
                                <td data-label="Total $"><?php echo $tt['diferencia_monto']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="table-container">
    <div class="table-responsive">
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
                        <td data-label="Concepto"><?php echo $total['concepto']; ?></td>
                        <td data-label="Monto"><?php echo $total['monto']; ?></td>
                        <td data-label="Fecha"><?php echo $total['fecha']; ?></td>
                        <td data-label="Detalle"><?php echo $total['detalle']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<br>

<?= $this->endSection() ?>
