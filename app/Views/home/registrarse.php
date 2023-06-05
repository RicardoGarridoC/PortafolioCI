<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f7f7f7;
      padding-top: 0px;
    }
    .register-form-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-form {
      width: 80%;
      max-width: 700px;
      padding: 40px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .register-form h1 {
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
  </style>
</head>
<body>
  <div class="register-form-wrapper">
    <div class="register-form">
      <h1>Registro</h1>
      <form>
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" id="name" placeholder="Ingrese su nombre" pattern="[^\d]+" required>
        </div>
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" class="form-control" id="email" placeholder="Ingrese su correo electrónico" required>
        </div>
        <div class="form-group">
          <label for="phone">Número de teléfono</label>
          <input type="tel" class="form-control" id="phone" placeholder="Ingrese su número de teléfono" pattern="[0-9]{8,}" required>
        </div>
        <div class="form-group">
          <label for="rut">RUT</label>
<input type="text" class="form-control" id="rut" placeholder="Ingrese su RUT" required>
</div>
<div class="form-group">
<label for="address">Dirección</label>
<input type="text" class="form-control" id="address" placeholder="Ingrese su dirección" required>
</div>
<button type="submit" class="btn btn-primary btn-block">Registrarse</button>
</form>
</div>

  </div>