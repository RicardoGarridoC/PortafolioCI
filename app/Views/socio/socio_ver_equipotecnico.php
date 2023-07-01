<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

<style>
    .example4 {
        overflow-x: auto;
        padding: 10px;
    }
    
    .table {
        width: 100%;
        table-layout: auto;
    }
    
    .table th,
    .table td {
        white-space: nowrap;
        padding: 8px;
    }
    
    @media (max-width: 576px) {
        .table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        .table thead,
        .table tbody,
        .table tr,
        .table th,
        .table td {
            display: block;
        }
        
        .table thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        .table tbody tr {
            border-bottom: 1px solid #ccc;
        }
        
        .table td:before {
            content: attr(data-label);
            font-weight: bold;
            display: inline-block;
            width: 120px;
            text-align: left;
        }
    }
    
    .table tbody td:first-child {
        font-weight: bold;
    }
    
    h2.text-center {
        margin-top: 20px;
    }
    
    .two-line {
        white-space: normal;
        line-height: 1.2;
    }
</style>

<div class="example4">
    <h2 class="text-center">Equipo Tecnico</h2>
    <table id="example4" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Equipo Proviene</th>
                <!-- <th>Sueldo</th>
                <th>Valor Hora Extra</th>
                <th>Horas Extra (Mes)</th>
                <th>Total a Pagar</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipotecnicos as $equipotecnico): ?>
                <tr>
                    <td data-label="Nombre"><?= $equipotecnico['nombre'] ?></td>
                    <td data-label="Cargo"><?= ucwords(str_replace('_', ' ', $equipotecnico['cargo'])) ?></td>
                    <td data-label="Equipo Proviene">
                        <span class="two-line"><?= $equipotecnico['equipo_proviene'] ?></span>
                    </td>
                    <!-- <td data-label="Sueldo"><?= $equipotecnico['sueldo'] ?></td>
                    <td data-label="Valor Hora Extra"><?= $equipotecnico['valor_hora_extra'] ?></td>
                    <td data-label="Horas Extra (Mes)"><?= $equipotecnico['horas_extras_mes'] ?></td>
                    <td data-label="Total a Pagar"><?= $equipotecnico['total_a_pagar'] ?></td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>

