<?php include __DIR__ . '/partials/inicio-doc.part.php' ?> <!-- Incluye la cabecera del documento -->

<!-- Barra de navegación -->
<?php include __DIR__.'/partials/nav.part.php'?> <!-- Incluye el archivo que contiene la barra de navegación -->
<!-- Fin de la Barra de navegación -->

<!-- Inicio del contenido principal -->
<div id="contact">
	<div class="container">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<h1>CONTACT US</h1> <!-- Título de la sección de contacto -->
			<hr>
			<p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

			<!-- Mensaje de confirmación cuando no hay errores y el formulario ha sido enviado correctamente -->
			<?php if (isset($errores) && empty($errores) && empty($errorEmail)): ?>
				<div class="alert alert-info">
					<?php 
						// Muestra los datos enviados por el usuario
						foreach ($datos as $dato) {
							echo "$dato <br>";
						}
					?>
				</div>
			<?php endif; ?>

			<!-- Mensaje de error cuando hay errores de validación en el formulario -->
			<?php if (isset($errores) && !empty($errores)): ?>
				<div class="alert alert-danger">
					<?php 
						// Muestra los errores encontrados en el formulario
						foreach ($errores as $error) {
							echo "$error <br>";
						}
					?>
				</div>
			<?php endif; ?>

			<!-- Mensaje de error cuando el email es inválido -->
			<?php if (isset($errorEmail) && !empty($errorEmail)): ?>
				<div class="alert alert-danger">
					<?php 
						// Muestra los errores de email
						foreach ($errorEmail as $email) {
							echo "$email <br>";
						}
					?>
				</div>
			<?php endif; ?>

			<!-- Formulario de contacto -->
			<form class="form-horizontal" method="post">
				<!-- Sección para ingresar nombre y apellido -->
				<div class="form-group">
					<div class="col-xs-6">
						<label class="label-control" for="nombre">First Name</label>
						<input class="form-control" type="text" name="nombre">
					</div>
					<div class="col-xs-6">
						<label class="label-control" for="apellido">Last Name</label>
						<input class="form-control" type="text" name="apellido">
					</div>
				</div>
				<!-- Sección para ingresar email -->
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="email">Email</label>
						<input class="form-control" type="text" name="email">
					</div>
				</div>
				<!-- Sección para ingresar asunto -->
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="asunto">Subject</label>
						<input class="form-control" type="text" name="asunto">
					</div>
				</div>
				<!-- Sección para ingresar mensaje -->
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="mensaje">Message</label>
						<textarea class="form-control" name="mensaje"></textarea>
						<!-- Botón para enviar el formulario -->
						<button class="pull-right btn btn-lg sr-button">SEND</button>
					</div>
				</div>
			</form>

			<hr class="divider"> <!-- Línea divisoria -->

			<!-- Información de contacto adicional -->
			<div class="address">
				<h3>GET IN TOUCH</h3> <!-- Título -->
				<hr>
				<p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
				<div class="ending text-center">
					<!-- Enlaces a redes sociales -->
					<ul class="list-inline social-buttons">
						<li><a href="#"><i class="fa fa-facebook sr-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter sr-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a></li>
					</ul>
					<!-- Información de contacto -->
					<ul class="list-inline contact">
						<li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
						<li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
					</ul>
					<!-- Información de derechos de autor -->
					<p>Photography Fanatic Template &copy; 2017</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Fin del contenido principal -->

<?php include __DIR__ . '/partials/fin-doc.part.php' ?> <!-- Incluye el pie del documento -->
