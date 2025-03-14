<!DOCTYPE html>
<html>

<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>

  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">

  <style>
    html,
    body {
      height: 100%;
      font-family: 'Numans', sans-serif;
      position: relative;
    }

    body::before {
      content: "";
      background-image: url(<?php echo base_url('/public/images/estadio2.jpg'); ?>);
      background-size: cover;
      background-repeat: no-repeat;
      filter: blur(8px); 
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1; 
    }

    @media only screen and (max-width: 768px) {
      .card {
        width: 100%;
        border-radius: 0;
        height: auto; 
        margin-bottom: 2vh;
      }
    }

    .container {
      height: 100%;
      align-content: center;
    }

    .card {
      min-height: 610px;
      margin-top: auto;
      margin-bottom: auto;
      width: 400px;
      background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .card-header h3 {
      color: rgb(255, 255, 255);
    }

    .card-header {
      position: relative;
    }

    .back_button {
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
    }

    .back_button .btn {
      color: #fff;
      font-size: 1rem;
    }

    .back_button .btn:hover {
      color: #000;
    }

    .input-group-prepend span {
      width: 50px;
      background-color: #FFC312;
      color: black;
      border: 0 !important;
    }

    input:focus {
      outline: 0 0 0 0 !important;
      box-shadow: 0 0 0 0 !important;
    }

    .remember {
      color: white;
    }

    .remember input {
      width: 20px;
      height: 20px;
      margin-left: 15px;
      margin-right: 5px;
    }

    .login_btn {
      color: black;
      background-color: #FFC312;
      width: 150px;
    }

    .login_btn:hover {
      color: black;
      background-color: white;
    }

    .links {
      color: white;
    }

    .links a {
      margin-left: 4px;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="card">
        <div class="card-header">
          <h3>Crear Cuenta</h3>
          <div class="back_button">
            <a href="<?php echo base_url('Home'); ?>" class="btn btn-link">
              <span><i class="fas fa-arrow-left"></i></span>
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="<?php echo base_url(); ?>Home/register" method="post">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellido" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
              </div>
              <input type="number" name="run" id="run" class="form-control" placeholder="Rut" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="password_hash" id="password_hash" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Continuar" class="btn float-right login_btn">
            </div>
            <br>


            <br>
            <div class="input-group form-group">
              <div class="d-flex justify-content-center links">
                Al crear una cuenta, aceptas las Condiciones de Uso y el Aviso de Privacidad de LOS ALCES F.C.
              </div>

            </div>

            <div class="input-group form-group">
              <div class="d-flex justify-content-center links">
                ¿Ya tienes una cuenta?<a href=<?php echo base_url('IniciarSesion'); ?>>Inicia Sesion</a>
              </div>

            </div>

          </form>
          <div class="row">
            <div class="col-12" style="text-align: center;">
              <?php
              if (isset($mensaje)) {
              ?>
                <div class="alert alert-<?= $tipo; ?>">
                  <?= $mensaje; ?>
                </div>

              <?php } ?>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</body>

</html>