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
                 <!-- Lista de socios seleccionados -->
                 <?php foreach ($sociosSeleccionados as $socio): ?>
                    <ul class="list-inline">
                        <li><img src="<?= $socio->getUrlLogo() ?>" alt="logo" width="50px"></li>
                        <li><?= htmlspecialchars($socio->getNombre()) ?></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>