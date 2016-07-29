<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php write($xlang['titulo_principal']); ?></title>
<?php write(HTML::style(URL::to('extra/assets/css/metro-bootstrap.css'), false)); ?>
<?php write(HTML::style(URL::to('extra/assets/css/apprise.css'), false)); ?>
<?php write(HTML::style(URL::to('extra/assets/css/jquery-ui.css'), false)); ?>
<?php write(HTML::style(URL::to('extra/assets/css/magnific-popup.css'), false)); ?>
<?php write(HTML::script(URL::to('extra/assets/js/jquery.js'), false)); ?>
<?php write(HTML::script(URL::to('extra/assets/js/jquery-ui.js'), false)); ?>
<?php write(HTML::script(URL::to('extra/assets/js/apprise.js'), false)); ?>
<?php write(HTML::script(URL::to('extra/assets/js/home.js'), false)); ?>
<?php write(HTML::script(URL::to('extra/assets/js/models.js'), false)); ?>
<?php write(HTML::script(URL::to('extra/assets/js/forms.js'), false)); ?>
<?php write(HTML::script(URL::to('extra/assets/js/jquery.magnific-popup.js'), false)); ?>
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
</style>
</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">                
            <div class="nav-collapse collapse">
                <span id="url" class="<?php write(URL::to('extra/home/lang')); ?>"></span>
                <ul class="nav">
                    <li class=""><?php write(HTML::link('extra/start', $xlang['inicio'])); ?></li>
                    <li class=""><?php write(HTML::link('extra/start/crud', 'CRUD')); ?></li>
                    <li class=""><?php write(HTML::link('extra/start/controllers', $xlang['controladores'])); ?></li>
                    <li class=""><?php write(HTML::link('extra/start/models', $xlang['modelos'])); ?></li>
                    <li class=""><?php write(HTML::link('extra/start/forms', $xlang['formularios'])); ?></li>
                    <li class=""><?php write(HTML::link('extra/start/logout', $xlang['cerrar_sesion'])); ?></li>
                    <li><a><?php write(Form::select('lang', $lang_options, true, ['id' => 'xlang', 'style' => 'width: 80px; font-size: 15px;'])); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>   
<br>