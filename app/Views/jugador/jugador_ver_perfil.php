<?= $this->extend('layout/jugador_template') ?>

<?= $this->section('contenido') ?>

<style>
    .input-group-text {
        cursor: pointer;
    }
</style>

<?php echo form_open('EditarUsuarioJugador'); ?>
    <div class="form-group">
        <?php
        echo form_label('Nombre(s)', 'nombres');
        echo form_input(array('name' => 'nombres', 'placeholder' => 'Nombres', 'class' => 'form-control', 'value' => session('nombresUsuario'), 'required' => 'required', 'readonly' => 'readonly'));
        echo "<br>";
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Apellido(s)', 'apellidos');
        echo form_input(array('name' => 'apellidos', 'placeholder' => 'Apellidos', 'class' => 'form-control', 'value' => session('apellidosUsuario'), 'required' => 'required', 'readonly' => 'readonly'));
        echo "<br>";
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Email', 'email');
        echo form_input(array('name' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'value' => session('emailUsuario'), 'required' => 'required', 'readonly' => 'readonly'));
        echo "<br>";
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_label('RUN', 'run');
        echo form_input(array('name' => 'run', 'placeholder' => 'RUN', 'class' => 'form-control', 'value' => session('runUsuario'), 'required' => 'required', 'readonly' => 'readonly'));
        echo "<br>";
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Dirección', 'direccion');
        echo form_input(array('name' => 'direccion', 'placeholder' => 'Dirección', 'class' => 'form-control', 'value' => session('direccionUsuario'), 'required' => 'required'));
        echo "<br>";
        ?>
    </div>
    <div class="form-group">
        <?php
        echo form_label('Teléfono', 'telefono');
        echo form_input(array('name' => 'telefono', 'placeholder' => 'Teléfono', 'class' => 'form-control', 'value' => session('telefonoUsuario'), 'required' => 'required'));
        echo "<br>";
        ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Contraseña', 'password_hash'); ?>
        <div class="input-group">
            <?php
            echo form_input(array('name' => 'password_hash', 'placeholder' => 'Contraseña', 'class' => 'form-control', 'type' => 'password', 'value' => $clavebuena, 'required' => 'required'));
            ?>
            <span class="input-group-text" onclick="togglePasswordVisibility();">
                <i class="bi bi-eye" id="show_eye"></i>
                <i class="bi bi-eye-slash d-none" id="hide_eye"></i>
            </span>
        </div>
        <br>
    </div>
    <div class="form-group">
        <?= form_hidden('id', session('idUsuario')) ?>
    </div>

  <button type="submit" class="btn btn-primary btn-block">Editar Usuario</button>
<?php echo form_close(); ?>

<script>
function togglePasswordVisibility() {
    var passwordInput = document.getElementsByName('password_hash')[0];
    var showEyeIcon = document.getElementById('show_eye');
    var hideEyeIcon = document.getElementById('hide_eye');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showEyeIcon.classList.add('d-none');
        hideEyeIcon.classList.remove('d-none');
    } else {
        passwordInput.type = 'password';
        showEyeIcon.classList.remove('d-none');
        hideEyeIcon.classList.add('d-none');
    }
}
</script>

<?= $this->endSection() ?>