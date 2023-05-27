<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DT - Jugadores</title>
    
</head>
<body>
    <?= $this->extend('layout/admin_template') ?>
    <?= $this->section('content') ?>

    <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">RUN</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Posicion</th>
                            <th scope="col">Goles</th>
                            <th scope="col">Partidos Jugados</th>
                            <th scope="col">Equipo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Sueldo</th>
                            <th scope="col">Ayuda</th>
                            <th scope="col">Lesionado</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Equipo ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($jugadores as $jugador){
                            echo "<tr>";
                            echo "<td>".$jugador['id']."</td>";
                            echo "<td>".$jugador['nombres']."</td>";
                            echo "<td>".$jugador['apellidos']."</td>";
                            echo "<td>".$jugador['run']."</td>";
                            echo "<td>".$jugador['fecha_nacimiento']."</td>";
                            echo "<td>".$jugador['posicion']."</td>";
                            echo "<td>".$jugador['goles']."</td>";
                            echo "<td>".$jugador['partidos_jugados']."</td>";
                            echo "<td>".$jugador['equipo_proviene']."</td>";
                            echo "<td>".$jugador['tipo']."</td>";
                            echo "<td>".$jugador['sueldo']."</td>";
                            echo "<td>".$jugador['ayuda_economica']."</td>";
                            echo "<td>".$jugador['lesionado']."</td>";
                            echo "<td>".$jugador['foto_url']."</td>";
                            echo "<td>".$jugador['equipo_id']."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">RUN</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Posicion</th>
                            <th scope="col">Goles</th>
                            <th scope="col">Partidos Jugados</th>
                            <th scope="col">Equipo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Sueldo</th>
                            <th scope="col">Ayuda</th>
                            <th scope="col">Lesionado</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Equipo ID</th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        
    <?= $this->endSection() ?>


</body>
</html>