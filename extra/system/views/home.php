<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php write($xlang['titulo_principal']); ?></title>
<?php write(HTML::style(URL::to('extra/assets/css/metro-bootstrap.css'), false)); ?>
<?php write(HTML::script(URL::to('extra/assets/js/jquery.js'), false)); ?>
<script type="text/javascript">
$(function(){
    $('#xlang').change(function(){
        var lang = $(this).val();
        $.ajax({
            type: 'POST',
            data: 'lang=' + lang,
            url: $('#url').attr('class'),
            dataType: 'html',
            success: function(){
                location.reload();
            }
        });
    });
});
</script>
</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">                
            <div class="nav-collapse collapse">
                <ul class="nav"><li class="active"><?php write(HTML::link('extra', $xlang['iniciar_sesion'])); ?></li></ul>
                <ul class="nav"><li class="active"><?php write(HTML::link('extra/home/logout', $xlang['salir'])); ?></li></ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="span8" id="1">
        <div class="hero-unit">
            <span id="url" class="<?php echo URL::to('extra/home/lang'); ?>"></span>
            <h2>
                <?php write($xlang['seccion_extra']); ?>
                <?php write(Form::select('lang', $lang_options, true, ['id' => 'xlang', 'style' => 'width: 80px; font-size: 15px;'])); ?>
            </h2>
            <?php write(Form::open('extra/home/login', 'post', ['class' => 'well'])); ?>
            <label><?php write($xlang['usuario']); ?>:</label>
                <?php write(Form::text('xtra_us_ad', '', true, ['class' => 'span3', 'autocomplete' => 'off', 'autofocus' => 'autofocus'])); ?>
                <label><?php write($xlang['contrasena']); ?>:</label>
                <?php write(Form::password('xtra_pwd_ad', '', true, ['class' => 'span3', 'autocomplete' => 'off'])); ?>
                <span class="help-block"></span>  
                <?php write(Form::submit($xlang['ingresar'], 'ingresar', ['class' => 'btn btn-inverse'])); ?>
            <?php write(Form::close()); ?>
        </div>
    </div>
</div>

</body>
</html>