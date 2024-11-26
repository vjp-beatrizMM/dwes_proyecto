<?php
// Mezclamos aleatoriamente las imágenes
shuffle($imagenes);
?>

<!-- Recorremos las imágenes y generamos el HTML -->
<?php foreach ($imagenes as $imagen): ?>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="sol">
            <!-- Mostramos la imagen -->
            <img class="img-responsive" src="<?= $imagen->getUrlPortfolio(); ?>" alt="<?= $imagen->getDescripcion(); ?>">
            <div class="behind">
                <div class="head text-center">
                    <!-- Lista de acciones -->
                    <ul class="list-inline">
                        <li>
                            <a class="gallery" href="<?= $imagen->getUrlGallery(); ?>" data-toggle="tooltip" data-original-title="Quick View">
                                <i class="fa fa-eye"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                                <i class="fa fa-heart"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Download">
                                <i class="fa fa-download"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="More information">
                                <i class="fa fa-info"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                        <div class="row box-content">
                            <ul class="list-inline text-center">
                                <li><i class="fa fa-eye"></i><?= $imagen->getNumVisualizaciones() ?></li>
                                <li><i class="fa fa-heart"></i><?= $imagen->getNumLike() ?></li>
                                <li><i class="fa fa-download"></i><?= $imagen->getNumDownloads() ?></li>
                            </ul>
                        </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Paginación -->
<nav class="text-center">
    <ul class="pagination">
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
</nav>