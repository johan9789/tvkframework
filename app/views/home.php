<div class="row">    
    <div class="col-md-1"></div>
    <div class="col-md-9" role="main">
        <div class="bs-docs-section">
            <div class="page-header">
                <h1>
                    <and id="bienvenido">Bienvenido :D</and>
                    <?php echo Form::select('', $lang, false, ['id' => 'lang']); ?>
                </h1>
            </div>
            <h3 id="descripcion">
                Gracias por estar aquí en la página inicial del TvK Framework. Esta es la versión 1.0, la primera que existe.
                Lo puedes usar como gustes y pues, sólo eso... úsalo cuando quieras (creo que esto debería ser gratis, 
                pero no sé por qué si solo lo uso yo y nadie más). Lo hice por aprender y también por diversión.
                Así que, disfrútalo (si es que lo llegas a usar...) :D
            </h3>
            <h4><and id="estas">Estás aquí :D</and> app/controllers/home.php </h4>
            <?php highlight_string($file); ?>
        </div>
    </div>
</div>