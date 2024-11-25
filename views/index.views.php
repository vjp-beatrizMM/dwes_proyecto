<?php include __DIR__ . '/partials/inicio-doc.part.php' ?> <!-- Incluye la cabecera del documento -->

<!-- Barra de navegación -->
<?php include __DIR__ . '/partials/nav.part.php' ?> <!-- Incluye el archivo de la barra de navegación -->
<!-- Fin de la Barra de navegación -->

<!-- Inicio del contenido principal -->
<div id="index">

   <!-- Cabecera de la página -->
   <div class="row">
     <div class="col-xs-12 intro">
       <div class="carousel-inner">
         <div class="item active">
           <!-- Imagen de cabecera -->
           <img class="img-responsive" src="images/index/woman.jpg" alt="header picture">
         </div>
         <div class="carousel-caption">
           <h1>FIND NICE PICTURES HERE</h1> <!-- Título de la cabecera -->
           <hr> <!-- Línea divisoria -->
         </div>
       </div>
     </div>
   </div>

   <?php
    // Definir las categorías con su ID y estado de activación
    $categories = [
      ['id' => 'category1', 'name' => 'Category I', 'isActive' => true],  // La categoría está activa
      ['id' => 'category2', 'name' => 'Category II', 'isActive' => false], // La categoría no está activa
      ['id' => 'category3', 'name' => 'Category III', 'isActive' => false] // La categoría no está activa
    ];
   ?>

   <div id="index-body">
     <!-- Tabla de navegación de categorías -->
     <div class="table-responsive">
       <table class="table text-center">
         <thead>
           <tr>
             <?php foreach ($categories as $category): ?>
               <!-- Enlace a cada categoría, con clase "active" si está activa -->
               <td>
                 <a class="link <?= $category['isActive'] ? 'active' : '' ?>" href="#<?= $category['id'] ?>" data-toggle="tab">
                   <?= $category['name'] ?>
                 </a>
               </td>
             <?php endforeach; ?>
           </tr>
         </thead>
       </table>
       <hr> <!-- Línea divisoria -->
     </div>

     <!-- Contenido de las categorías en pestañas -->
     <div class="tab-content">
       <?php foreach ($categories as $category): ?>
         <div id="<?= $category['id'] ?>" class="tab-pane <?= $category['isActive'] ? 'active' : '' ?>">
           <!-- Aquí se incluirán las imágenes de la galería de cada categoría -->
           <?php include __DIR__ . '/partials/image-gallery.part.php' ?>
         </div>
       <?php endforeach; ?>
     </div>
     <!-- Fin del contenido de las categorías -->

   </div><!-- Fin del contenedor principal del índice -->

   <!-- Formulario de suscripción al boletín -->
   <div class="index-form text-center">
     <h3>SUSCRIBE TO OUR NEWSLETTER</h3> <!-- Título del formulario -->
     <h5>Suscribe to receive our News and Gifts</h5> <!-- Descripción -->
     <form class="form-horizontal">
       <div class="form-group">
         <div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
           <!-- Campo de texto para ingresar el email -->
           <input class="form-control" type="text" placeholder="Type here your email address">
           <a href="" class="btn btn-lg sr-button">SUBSCRIBE</a> <!-- Botón de suscripción -->
         </div>
       </div>
     </form>
   </div>
   <!-- Fin del formulario de suscripción -->

   <!-- Sección con socios y sus logotipos -->
   <div class="last-box row">
     <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
       <div class="partner-box text-center">
         <p>
           <!-- Dirección de la empresa -->
           <i class="fa fa-map-marker fa-2x sr-icons"></i>
           <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
         </p>
         <h4>Our Main Partners</h4> <!-- Título de los socios principales -->
         <hr>
         <div class="text-muted text-left">
           <!-- Lista de socios con sus logotipos -->
           <ul class="list-inline">
             <li><img src="images/index/log2.jpg" alt="logo"></li>
             <li>First Partner Name</li> <!-- Nombre del primer socio -->
           </ul>
           <ul class="list-inline">
             <li><img src="images/index/log1.jpg" alt="logo"></li>
             <li>Second Partner Name</li> <!-- Nombre del segundo socio -->
           </ul>
           <ul class="list-inline">
             <li><img src="images/index/log3.jpg" alt="logo"></li>
             <li>Third Partner Name</li> <!-- Nombre del tercer socio -->
           </ul>
         </div>
       </div>
     </div>
   </div>
   <!-- Fin de la sección de socios -->

 </div><!-- Fin del índice -->

 <!-- Pie de página -->
 <footer class="home-page">
   <div class="container text-muted text-center">
     <div class="row">
       <ul class="nav col-sm-4">
         <!-- Información de contacto -->
         <li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
         <li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
         <li>Photography Fanatic Template &copy; 2017</li>
       </ul>
       <ul class="list-inline social-buttons col-sm-4 col-sm-push-4">
         <!-- Iconos de redes sociales -->
         <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a></li>
         <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a></li>
         <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a></li>
       </ul>
     </div>
   </div>
 </footer>

 <?php include __DIR__ . '/partials/fin-doc.part.php' ?> <!-- Incluye el pie del documento -->
