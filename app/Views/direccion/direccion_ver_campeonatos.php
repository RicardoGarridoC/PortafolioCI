<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>
<style>
    .championship-table {
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
</style>

<body>
    <br>
    <div class="championship-table">
        <h2 class="text-center">Campeonato Femenino</h2>
        <table id="championshipTable1" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Equipo</th>
                    <th>PJ</th>
                    <th>PG</th>
                    <th>PE</th>
                    <th>PP</th>
                    <th>GF</th>
                    <th>GC</th>
                    <th>+/-</th>
                    <th>Puntaje</th>
                </tr>
            </thead>
            <tbody>
                <?php $position = 1; ?>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $position++; ?></td>
                        <td data-label="Equipo"><?php echo $row['equipo']; ?></td>
                        <td data-label="PJ"><?php echo $row['partidos_jugados']; ?></td>
                        <td data-label="PG"><?php echo $row['partidos_ganados']; ?></td>
                        <td data-label="PE"><?php echo $row['partidos_empatados']; ?></td>
                        <td data-label="PP"><?php echo $row['partidos_perdidos']; ?></td>
                        <td data-label="GF"><?php echo $row['goles_a_favor']; ?></td>
                        <td data-label="GC"><?php echo $row['goles_en_contra']; ?></td>
                        <td data-label="+/-"><?php echo $row['diferencia_goles']; ?></td>
                        <td data-label="Puntaje"><?php echo $row['puntaje']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

<?= $this->endSection() ?>