<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>


  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
      filter: blur(8px); /* Ajusta el nivel de desenfoque a tu gusto */
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1; /* Coloca la imagen de fondo detrás del contenido */
    }

    @media only screen and (max-width: 768px) {
      .card {
        width: 100%;
        border-radius: 0;
        height: auto; /* Esto permitirá que el card se estire verticalmente si el contenido es más largo */
      }
  }
    .container {
      height: 100%;
      align-content: center;
    }

    .card {
      height: 370px;
      margin-top: auto;
      margin-bottom: auto;
      width: 400px;
      background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .card-header h3 {
      color: rgb(255, 238, 0);
    }
    .back_button {
      position: relative;
      right: 0px;
      top: 0px;
      margin-right: 15px;
    }
    .back_button .btn {
      color: #000;
      font-size: 2rem;
    }

    .back_button .btn:hover {
      color: #fff;
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
          <h3></h3>
          <div class="d-flex justify-content-end social_icon">
          </div>
          <div class="d-flex justify-content-start back_button">
            <a  href=<?php echo base_url('Home'); ?> class="btn btn-link text-left">
              <span><i class="fas fa-arrow-left"></i></span>
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="<?php echo base_url(); ?>Home/validarIngreso" method="post">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="email" id="email" class="form-control" placeholder="Correo Electronico" required="Email">

            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="row align-items-center remember">
              <input type="checkbox">Recuerdame
            </div>
            <div class="form-group">
              <input type="submit" value="Iniciar Sesión" class="btn float-right login_btn">
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
        <div class="card-footer">
          <div class="d-flex justify-content-center links">
            ¿Eres nuevo?<a href=<?php echo base_url('Registrarse'); ?>>Registrate</a>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</body>

</html>