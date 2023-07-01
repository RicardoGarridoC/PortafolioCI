<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex-grow: 1;
      padding-bottom: 20px;
    }

    footer {
      width: 100%;
      text-align: center;
      background: linear-gradient(45deg, #c13b1d 5%, #fa8e2a 95%);
      color: black;
      padding: 20px;
      position: fixed;
      bottom: 0;
    }

    .footer p {
      margin-bottom: 0;
      color: #fff;
    }
  </style>
  <script>
    window.addEventListener('DOMContentLoaded', function() {
      var body = document.querySelector('body');
      var footer = document.querySelector('footer');

      function adjustFooterPosition() {
        if (body.clientHeight >= window.innerHeight) {
          // Se muestra la barra de desplazamiento
          footer.style.position = 'static';
        } else {
          // No se muestra la barra de desplazamiento
          footer.style.position = 'fixed';
        }
      }

      adjustFooterPosition(); // Ajustar posición inicialmente

      window.addEventListener('resize', adjustFooterPosition); // Ajustar posición al cambiar el tamaño de la ventana
    });
  </script>
</head>
<body>
  <main>
    <!-- Contenido dinámico del cuerpo de la página aquí -->
  </main>

  <footer>
    <div class="footer-text">
      <p>© Los Alces FC. Todos los derechos reservados.</p>
      <p>Developed by DevGroup DAF devgroupdaf@contacto.com</p>
    </div>
  </footer>
</body>
</html>
