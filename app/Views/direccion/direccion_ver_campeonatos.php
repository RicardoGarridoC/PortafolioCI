<?= $this->extend('layout/direccion_template') ?>

<?= $this->section('direccion_contenido') ?>
<style>
    .championship-table {
        overflow-x: auto;
    }
    
    .table {
        width: 100%;
        table-layout: auto;
    }
    .table th,
    .table td {
        white-space: nowrap;
    }
</style>

<body>
    <br>
    <div class="championship-table">
        <h2 class="text-center">Campeonato Femenino</h2>
        <table id="championshipTable1" class="table table-striped">
            <thead>
                <tr>
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
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['equipo']; ?></td>
                        <td><?php echo $row['partidos_jugados']; ?></td>
                        <td><?php echo $row['partidos_ganados']; ?></td>
                        <td><?php echo $row['partidos_empatados']; ?></td>
                        <td><?php echo $row['partidos_perdidos']; ?></td>
                        <td><?php echo $row['goles_a_favor']; ?></td>
                        <td><?php echo $row['goles_en_contra']; ?></td>
                        <td><?php echo $row['diferencia_goles']; ?></td>
                        <td><?php echo $row['puntaje']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

<?= $this->endSection() ?>