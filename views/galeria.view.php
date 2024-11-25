<?php include __DIR__ . '/partials/inicio-doc.part.php' ?> <!-- Incluye la cabecera del documento -->

<!-- Barra de navegación -->
<?php include __DIR__ . '/partials/nav.part.php' ?> <!-- Incluye el archivo de la barra de navegación -->
<!-- Fin de la Barra de navegación -->

<!-- Inicio del contenido principal -->
<div id="galeria">
	<div class="container">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<h1>GALERIA</h1> <!-- Título de la sección de galería -->
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

			<!-- Formulario para subir una imagen a la galería -->
			<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
				<!-- Campo para seleccionar una imagen -->
				<div class="form-group">
					<div class="col-xs-6">
						<label class="label-control">Image</label>
						<input class="form-control-file" type="file" name="imagen">
					</div>
				</div>
				<!-- Campo para seleccionar la categoría de la imagen -->
				<div class="form-group">
					<div class="col-xs-6">
						<label class="label-control">Category</label>
						<select class="form-control-file" name="categoria">
							<?php foreach ($categorias as $categoria): ?>
								<!-- Lista de categorías que el usuario puede elegir -->
								<option value="<?= $categoria->getId()?>">
									<?= $categoria->getNombre()?>
								</option>
							<?php endforeach?>	
						</select>
					</div>
				</div>
				<!-- Campo para ingresar la descripción de la imagen -->
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Description</label>
						<textarea class="form-control" name="descripcion"> <?= $descripcion ?> </textarea>
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
							<th scope="col">Imagen</th> <!-- Imagen en miniatura -->
							<th scope="col">Categoría</th> <!-- Categoría a la que pertenece la imagen -->
							<th scope="col">Visualizaciones</th> <!-- Número de visualizaciones de la imagen -->
							<th scope="col">Likes</th> <!-- Número de likes de la imagen -->
							<th scope="col">Descargas</th> <!-- Número de descargas de la imagen -->
						</tr>
					</thead>
					<tbody>
						<!-- Itera sobre todas las imágenes para mostrar sus datos -->
						<?php foreach ($imagenes as $img): ?>
							<tr>
								<th scope="row"><?= $img->getId() ?></th> <!-- Muestra el ID de la imagen -->
								<td>
									<img src="<?= $img->getUrlGallery() ?>" 
									alt="<?= $img->getDescripcion() ?>" 
									title="<?= $img->getDescripcion() ?>"
									width="100px"> <!-- Muestra la miniatura de la imagen -->
								</td>
								<td><?=$categorias[$img->getCategoria() - 1]->getNombre()?></td> <!-- Muestra la categoría de la imagen -->
								<td><?=$img->getNumVisualizaciones()?></td> <!-- Muestra el número de visualizaciones -->
								<td><?=$img->getNumLike()?></td> <!-- Muestra el número de likes -->
								<td><?=$img->getNumDownloads()?></td> <!-- Muestra el número de descargas -->
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Fin del contenido principal -->

<?php include __DIR__ . '/partials/fin-doc.part.php' ?> <!-- Incluye el pie del documento -->
