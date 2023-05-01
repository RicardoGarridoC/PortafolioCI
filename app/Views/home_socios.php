<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/styles/home_socios.css">
</head>
<body>
  <!-- Contenido de la página -->
  <video autoplay muted loop id="video-background">
    <source src="<?php echo base_url('public/Background5.mp4'); ?>" type="video/mp4">
  </video>
  <div class="gradient-overlay"></div>
  <div class="buttons-container">
    <a type="button" class="btn" href=<?php echo base_url('index.php/IniciarSesion'); ?>>Iniciar Sesión</a>
    <a type="button" class="btn" href=<?php echo base_url('index.php/Registrarse'); ?>>Registrarse</a>
  </div>
</body>