<!DOCTYPE html>
<html lang="es">
<?php session_start(); ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta property="twitter:card" content="summary_large_image" />
  <title>Apsion</title>
  <link rel="icon" href="media/icono-apsion.svg">

  <style data-tag="reset-style-sheet">
    html {
      line-height: 1.15;
    }

    body {
      margin: 0;
    }

    * {
      box-sizing: border-box;
      border-width: 0;
      border-style: solid;
    }

    p,
    li,
    ul,
    pre,
    div,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    figure,
    blockquote,
    figcaption {
      margin: 0;
      padding: 0;
    }

    button {
      background-color: transparent;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0;
    }

    button,
    select {
      text-transform: none;
    }

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
      -webkit-appearance: button;
    }

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
      border-style: none;
      padding: 0;
    }

    button:-moz-focus,
    [type="button"]:-moz-focus,
    [type="reset"]:-moz-focus,
    [type="submit"]:-moz-focus {
      outline: 1px dotted ButtonText;
    }

    a {
      color: inherit;
      text-decoration: inherit;
    }

    input {
      padding: 2px 4px;
    }

    img {
      display: block;
    }

    html {
      scroll-behavior: smooth;
    }
  </style>
  <style data-tag="default-style-sheet">
    html {
      font-family: Inter;
      font-size: 16px;
    }

    body {
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      letter-spacing: normal;
      line-height: 1.15;
      color: var(--dl-color-gray-black);
      background-color: var(--dl-color-gray-white);
    }
  </style>
  <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
  <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/apsion.css" />
  <link rel="stylesheet" href="style/pedirCita.css" />
  <link rel="stylesheet" href="style/psicologos.css" />
</head>

<body>
  <?php include_once "models/BBDD/mysql.php"; ?>

  <div class="apsion-container">
    <div class="apsion-apsion">
      <header id="inicio">
        <div id="apsion-filter"></div>
        <?php include "includes/navbar.php" ?>

        <div id="inicio-seccion" class="seccion-container">
          <h1 id="inicio-title">
            <span class="texto-destacado">A</span>tención
            <span class="texto-destacado">psi</span>cológica
            <span class="texto-destacado">on</span>line
          </h1>
          <p id="inicio-subtitle">
            Empieza tu tratamiento con profesionales certificados
          </p>
          <button class="elementoBoton">
            <a href="includes/registro.php">Únete</a>
          </button>
        </div>
      </header>

      <!--SERVICIOS -->
      <?php include "includes/servicios.html" ?>

      <!--PSICOLOGOS-->

      <?php include "includes/psicologos.html" ?>

      <!--PEDIR CITA-->

      <?php include "includes/pedircita.php"?>
      
      <!--INCLUDE CONTACTO-->
    
      <?php include "includes/contacto.html" ?>

      <!--INCLUDE BLOG-->

      <?php include "includes/blog.html" ?>

      <!--FOOTER-->

      <?php include "includes/footer.html" ?>
      
    </div>
  </div>
</body>

</html>