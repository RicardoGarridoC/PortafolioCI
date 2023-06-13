
<?= $this->extend('layout/sidebarsocio') ?>

<?= $this->section('contenido') ?>

<!--Colocar Contenido Aqui-->
<h6>
<?= session('nombresUsuario') ?>
<br>
<?= session('apellidosUsuario') ?>
<br>
<?= session('emailUsuario') ?>
<br>
<?= session('runUsuario') ?>
<br>
<?= session('direccionUsuario') ?>
<br>
<?= session('telefonoUsuario') ?>
<br>
<?= session('passwordUsuario') ?>
</h6>

<?= $this->endSection() ?>
