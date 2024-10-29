<link rel="stylesheet" href="style/navbar.css" />
<script src="js/navbar.js"></script>

<nav id="navbar">
  <div id="cabecera-usuario" <?=isset($_SESSION["autenticado"]) ? '' : 'hidden' ?> > 
    <p> ¡Hola <?php echo $_SESSION["nombre"] ?? '' ?>! </p>
  </div>
  <div id="navbarDiv">
    <div id="navDiv">
      <a href="index.php"><img src="media/Original.svg" alt="logo-apsion" id="logo"/></a>
    </div>
    <ul id="menu">
      <li class="elementoMenu"><a href="#inicio">Inicio</a></li>
      <li class="elementoMenu"><a href="#servicios">Servicios</a></li>
      <li class="elementoMenu"><a href="#psicologos">Psicólogos</a></li>
      <li class="<?=isset($_SESSION["autenticado"]) ? 'elementoMenu' : 'test'?>"><a href="#pedirCita"><?= isset($_SESSION["autenticado"]) ? 'Pedir Cita' : '' ?></a></li>
      <li class="<?=isset($_SESSION["autenticado"]) ? 'elementoMenu' : 'test'?>"><a href="includes/agenda.php"><?= isset($_SESSION["autenticado"]) ? 'Agenda' : '' ?></a></li>
      <li class="elementoMenu"><a href="#contacto">Contacto</a></li>
      <li class="elementoMenu"><a href="#blog">Blog</a></li>
      <li class="elementoMenu" id="inicioSesion"><a href="includes/login.php"><?= isset($_SESSION["autenticado"]) ? '' : 'Iniciar Sesión' ?></a></li>
      <?php  
        if (!isset($_SESSION["autenticado"])) :
      ?>
      <button class="elementoBoton">
        <a href="includes/registro.php"><?= isset($_SESSION["autenticado"]) ? '' : 'Únete' ?> &nbsp;&nbsp;</a>
      </button>
      <?php  
        elseif (isset($_SESSION["autenticado"])) :
      ?>
      <button class="elementoBoton">
        <a href="includes/logout.php"><?= isset($_SESSION["autenticado"]) ? 'Salir' : '' ?> &nbsp;&nbsp;</a>
      </button>
      <?php
      endif;
      ?>
    </ul>
  </div>
</nav>
