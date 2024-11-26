<?php include __DIR__ . '/partials/inicio-doc.part.php' ?> <!-- Incluye la cabecera del documento -->

<!-- Barra de navegación -->
<?php include __DIR__ . '/partials/nav.part.php' ?> <!-- Incluye el archivo de la barra de navegación -->
<!-- Fin de la Barra de navegación -->

<!-- Inicio del contenido principal -->
<div id="asociados">
	<div class="container">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<h1>PARTNERS</h1> <!-- Título de la sección de galería -->
			<hr>
			
			<!-- Verifica si se ha enviado un formulario -->
			<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
				<!-- Si se ha enviado el formulario, muestra una alerta con el mensaje correspondiente -->
				<div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<?php if (empty($errores)) : ?>
						<p> <?= $mensaje ?> </p> <!-- Muestra el mensaje si no hay errores -->
					<?php else : ?>
						<ul>
							<?php foreach ($errores as $error) : ?>
								<li> <?= $error ?> </li> <!-- Muestra cada error en una lista -->
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<!-- Formulario para subir un asociado -->
			<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
				<!-- Campo para ingresar el nombre del asociado -->
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre</label>
                        <input class="form-control" type="text" id="nombre" name="nombre">
					</div>
				</div>
				<!-- Campo para seleccionar un logo -->
				<div class="form-group">
					<div class="col-xs-6">
						<label class="label-control">Logo</label>
                        <input class="form-control-file" type="file" id="logo" name="logo">
					</div>
				</div>
				<!-- Campo para ingresar la descripción del asociado -->
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Description</label>
						<textarea class="form-control" name="descripcion" id="descripcion"></textarea>
						<!-- Botón para enviar el formulario -->
						<button class="pull-right btn btn-lg sr-button">SEND</button>
					</div>
				</div>
			</form>
			<hr class="divider"> <!-- Línea divisoria -->

			<!-- Sección que muestra las imágenes de la galería con sus detalles -->
			<div class="imagenes_galeria">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th> <!-- ID de la imagen -->
							<th scope="col">Nombre</th> <!-- Nombre del asociado -->
							<th scope="col">Logo</th> <!-- Imagen en miniatura logo -->
						</tr>
					</thead>
					<tbody>
						<!-- Itera sobre todas los asociados para mostrar sus datos -->
                        <?php foreach ($asociados as $asociado): ?>
                            <tr>
                                <th scope="row"><?= $asociado->getId() ?></th>
                                <td><?= $asociado->getNombre() ?></td>
                                <td>
                                    <img src="<?= $asociado->getUrlLogo() ?>"
                                        alt="<?= $asociado->getDescripcion() ?>"
                                        title="<?= $asociado->getDescripcion() ?>"
                                        width="100px">
                                </td>
                            </tr>
                        <?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Fin del contenido principal -->

<?php include __DIR__ . '/partials/fin-doc.part.php' ?> <!-- Incluye el pie del documento -->
