
<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

<style>
    body {
        background-color: #333;
       
    }
    
    .probando {
        background-color: #ffffff;
        padding: 20px;
        margin-bottom: 20px;
    }
    .small-image {
        width: 100%;
        height: auto;
        max-width: 250px;
        max-height: 250px;
    }
</style>

<div class="container probando">
 <h3 class="text-center">Proximos Partidos</h3>  
 <hr>
    <?php foreach ($results9 as $row9) : ?>
        <h2 class="text-center h5-sm">Partido <?php echo $row9['id']; ?></h2>
        <h4 class="text-center h6-sm">Fecha: <?php echo $row9['fecha']; ?></h4>
        <h4 class="text-center h6-sm">Ubicacion: <?php echo $row9['cancha']; ?></h4>
        <div class="row">
            <div class="col-12">
                <div class="row text-center">
                    <div class="col-6">
                        <h4 class="h6-sm"><?php echo $row9['equipo_local']; ?></h4>
                        <img src="<?= base_url()?>public/images/logoalce1.png" class="small-image" alt="">
                    </div>
                    <div class="col-6">
                        <h4 class="h6-sm"><?php echo $row9['equipo_visita']; ?></h4>
                        <img src="<?= base_url()?>public/images/logovisita1.png" class="small-image" alt="">
                    </div>
                </div>
            </div>
            <hr>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
