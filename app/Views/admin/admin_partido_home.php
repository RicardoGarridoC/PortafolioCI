<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>


<style>
    .probando {
        /* background-color: #222; */
        padding: 20px;
        margin-bottom: 20px;
    }
</style>

<div class="container probando">
    <h2 class="text-center">Últimos Partidos</h2>
    <div class="row">
        <?php foreach ($partidos as $partido) { 
            $index = key($partidos);
        ?>
        <div class="col-md-6">
            <h6 class="text-center gray-text">Fecha: <?= $partido['fecha'] ?> </h6>
            <div class="row">
                <div class="col-12">
                    <div class="row text-center">
                        <div class="col">
                            <?= $partido['equipos'] ?>
                            <?= $partido['resultado'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- TABS -->
                    <ul class="nav nav-tabs d-flex justify-content-between" id="myTab<?= $index ?>" role="tablist">
                        <li class="nav-item flex-fill">
                            <a class="nav-link active text-center" id="goles-tab<?= $index ?>" data-toggle="tab" href="#goles<?= $index ?>" role="tab" aria-controls="goles<?= $index ?>" aria-selected="true">Goles</a>
                        </li>
                        <li class="nav-item flex-fill">
                            <a class="nav-link text-center" id="cambios-tab<?= $index ?>" data-toggle="tab" href="#cambios<?= $index ?>" role="tab" aria-controls="cambios<?= $index ?>" aria-selected="false">Cambios</a>
                        </li>
                        <li class="nav-item flex-fill">
                            <a class="nav-link text-center" id="tarjetas-tab<?= $index ?>" data-toggle="tab" href="#tarjetas<?= $index ?>" role="tab" aria-controls="tarjetas<?= $index ?>" aria-selected="false">Tarjetas</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent<?= $index ?>">
                        <!-- GOLES-->
                        <div class="tab-pane fade show active" id="goles<?= $index ?>" role="tabpanel" aria-labelledby="goles-tab<?= $index ?>">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="text-start smaller-text">
                                        <li><?= $partido['goles_jugadores_local'] ?></li>
                                        <hr>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="text-end smaller-text">
                                        <li><?= $partido['goles_jugadores_visita'] ?></li>
                                        <hr>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- CAMBIOS -->
                        <div class="tab-pane fade" id="cambios<?= $index ?>" role="tabpanel" aria-labelledby="cambios-tab<?= $index ?>">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="text-start smaller-text">
                                        <li><?= $partido['cambios_local'] ?></li>
                                        <hr>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="text-end smaller-text">
                                        <li><?= $partido['cambios_visita'] ?></li>
                                        <hr>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- TARJETAS -->
                        <div class="tab-pane fade" id="tarjetas<?= $index ?>" role="tabpanel" aria-labelledby="tarjetas-tab<?= $index ?>">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="text-start smaller-text">
                                        <li><?= $partido['tarjetas_local'] ?></li>
                                        <hr>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="text-end smaller-text">
                                        <li><?= $partido['tarjetas_visita'] ?></li>
                                        <hr>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        next($partidos); // Avanza al siguiente elemento del array $partidos
        } ?>
    </div>
</div>

<?= $this->endSection() ?>