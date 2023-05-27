<head>
  <meta charset="UTF-8">
  <title>Inicio de sesión</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f7f7f7;
      padding-top: 0px;
    }
    .login-form-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-form {
      width: 80%;
      max-width: 700px;
      padding: 40px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-form h1 {
      text-align: center;
      margin-bottom: 40px;
    }
    .form-group label {
      font-size: 20px;
    }
    .form-control {
      height: 50px;
      font-size: 18px;
      border-radius: 5px;
      border: 2px solid #ddd;
    }
    .form-control:focus {
      border-color: #1e87f0;
      box-shadow: none;
    }
    .form-check-label {
      font-size: 18px;
    }
    .btn-primary {
      height: 50px;
      font-size: 20px;
      font-weight: bold;
      border-radius: 5px;
      background-color: #1e87f0;
      border-color: #1e87f0;
    }
    .btn-primary:hover {
      background-color: #185b9d;
      border-color: #185b9d;
    }
    @media only screen and (max-width: 5000px) {
      .register-form {
        width: 80%;
        padding: 20px;
      }
      .register-form h1 {
        font-size: 28px;
      }
      .form-group label {
        font-size: 18px;
      }
      .form-control {
        height: 40px;
        font-size: 16px;
      }
      .form-check-label {
        font-size: 16px;
      }
      .btn-primary {
        height: 40px;
        font-size: 18px;
      }
    }
  </style>
</head>
<body>
  <div class="login-form-wrapper">
    <div class="login-form">
      <h1>Iniciar sesión</h1>
      <form action=<?php echo base_url('index.php/DashboardSocio'); ?>>
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" class="form-control" id="email" placeholder="Ingrese su correo electrónico">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
        </div>
        <div class="form-check mb-4">
          <input type="checkbox" class="form-check-input" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Recuérdame</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
      </form>
    </div>
  </div>