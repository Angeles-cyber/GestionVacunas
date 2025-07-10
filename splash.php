<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cargando...</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      background-color: #000;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #splash {
      opacity: 1;
      transition: opacity 2s ease-out;
      max-width: 60%;
      height: auto;
    }

    .fade-out {
      opacity: 0;
    }
  </style>
</head>
<body>

  <img id="splash" src="Fondo/Banner.png" alt="Bienvenido">

  <script>
    setTimeout(() => {
      document.getElementById('splash').classList.add('fade-out');
    }, 2000);

    setTimeout(() => {
      window.location.href = 'index.php';
    }, 4000);
  </script>

</body>
</html>
