<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login_btn {
            color: black;
            background-color: #f90101;
            width: 150px;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="container mt-5">
        <h4> Hola
            <?= session('nombreUsuario') ?>, has iniciado sesion correctamente.
        </h4>
    </div>


    <div class="container mt-5">
        <input type="submit" value="Cerrar Sesión" class="btn float-right login_btn" onclick="cerrarSesion()">
    </div>
    <script type="text/javascript">
        function cerrarSesion() {
            window.location.href = " <?php echo base_url('IniciarSesion/cerrarSesion'); ?>"
        }
    </script>
</body>

</html>