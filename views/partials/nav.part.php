<!-- Barra de Navegación -->
<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <!-- Cabecera de la barra de navegación -->
    <div class="navbar-header">
      <!-- Botón de menú para dispositivos móviles (icono de hamburguesa) -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <!-- Texto accesible para lectores de pantalla -->
        <span class="sr-only">Alternar navegación</span>
        <!-- Barras del menú hamburguesa -->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- Enlace al inicio de la página (logo) -->
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>DWES BeatrizMM</span>
      </a>
    </div>
    <!-- Fin de la cabecera de la barra -->

    <!-- Menú colapsable -->
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">
        <!-- Opción del menú: Inicio -->
        <li class="<?php echo esOpcionMenuActiva("/index.php") ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva("/index.php") ? "#" : "index.php" ?>">
            <i class="fa fa-home sr-icons"></i> Home
          </a>
        </li>
        <!-- Opción del menú: Sobre nosotros -->
        <li class="<?php echo esOpcionMenuActiva("/about.php") ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva("/about.php") ? "#" : "about.php" ?>">
            <i class="fa fa-bookmark sr-icons"></i> About
          </a>
        </li>
        <!-- Opción del menú: Blog -->
        <li class="<?php echo existeOpcionMenuActivaEnArray(['/blog.php', '/single_post.php']) ? 'active' : '' ?> lien">
          <a href="<?php echo esOpcionMenuActiva("/blog.php") ? "#" : "blog.php" ?>">
            <i class="fa fa-file-text sr-icons"></i> Blog
          </a>
        </li>
        <!-- Opción del menú: Contacto -->
        <li class="<?php echo esOpcionMenuActiva("/contact.php") ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva("/contact.php") ? "#" : "contact.php" ?>">
            <i class="fa fa-phone-square sr-icons"></i> Contact
          </a>
        </li>
        <!-- Opción del menú: Galería (añadida después) -->
        <li class="<?php echo esOpcionMenuActiva("/galeria.php") ? "active" : "" ?> lien">
          <a href="<?php echo esOpcionMenuActiva("/galeria.php") ? "#" : "galeria.php" ?>">
            <i class="fa fa-image sr-icons"></i> Gallery
          </a>
        </li>
        <!-- Opción del menú: Socios (añadida después) -->
        <li class="<?php echo esOpcionMenuActiva("/partners.php") ? "active" : "" ?>">
          <a href="<?php echo esOpcionMenuActiva("/partners.php") ? "#" : "partners.php" ?>">
            <i class="fa fa-hand-o-right"></i> Partners
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Fin de la Barra de Navegación -->
