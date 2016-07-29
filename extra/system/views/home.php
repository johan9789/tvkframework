<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $xlang['titulo_principal']; ?></title>
<?php echo HTML::style(App::base('extra/assets/css/metro-bootstrap.css'), false); ?>
<?php echo HTML::script(App::base('extra/assets/js/jquery.js'), false); ?>
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
                <ul class="nav"><li class="active"><?php echo HTML::link('extra', $xlang['iniciar_sesion']); ?></li></ul>
                <ul class="nav"><li class="active"><?php echo HTML::link('extra/home/logout', $xlang['salir']); ?></li></ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="span8" id="1">
        <div class="hero-unit">
            <span id="url" class="<?php echo App::base('extra/home/lang'); ?>"></span>
            <h2>
                <?php echo $xlang['seccion_extra']; ?>
                <?php echo Form::select('lang', $lang_options, true, ['id' => 'xlang', 'style' => 'width: 80px; font-size: 15px;']); ?>
            </h2>
            <?php echo Form::open('extra/home/login', 'post', ['class' => 'well']); ?>
            <label><?php echo $xlang['usuario']; ?>:</label>
                <?php echo Form::text('xtra_us_ad', '', true, ['class' => 'span3', 'autocomplete' => 'off', 'autofocus' => 'autofocus']); ?>
                <label><?php echo $xlang['contrasena'] ?>:</label>
                <?php echo Form::password('xtra_pwd_ad', '', true, ['class' => 'span3', 'autocomplete' => 'off']); ?>
                <span class="help-block"></span>  
                <?php echo Form::submit($xlang['ingresar'], 'ingresar', ['class' => 'btn btn-inverse']); ?>
            <?php echo Form::close(); ?>
        </div>
    </div>
</div>

</body>
</html>