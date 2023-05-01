<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/styles/registrarse.css">
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