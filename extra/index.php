<?php
/**
 * TvK Framework
 * 
 * Framework de código abierto (o tal vez no), lo cree por motivos de aprendizaje.
 * Open source framework (or maybe not), I created it by learning reasons.
 * 
 * @author Johan Pineda <jmpv567@gmail.com>
 * @copyright Copyright(c) 2014, Johan Pineda
 * @license http://www.tvkframework.com/user_guide/license.html
 * @link http://www.tvkframework.com/
 * @since 1.0
 * @version 1.0
 * 
 */

/**
 * Inicia la sección extra.
 * Starts extra section.
 */
require_once 'config.php';
require_once '../app/config/paths.php';
require_once '../'.SYSTEM.'core/App.php';
require_once '../'.SYSTEM.'util/Functions.php';
require_once '../'.SYSTEM.'helpers/Form.php';
require_once '../'.SYSTEM.'helpers/HTML.php';
require_once '../'.SYSTEM.'libraries/Redirect.php';
require_once 'system/lang.php';

if($adm_auth['active'] == false){            
    Redirect::to();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $xlang['titulo_principal']; ?></title>
<?php echo HTML::style('assets/css/metro-bootstrap.css', false); ?>
</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">                
            <div class="nav-collapse collapse">
                <ul class="nav"><li class="active"><?php echo HTML::link('index.php', $xlang['iniciar_sesion']); ?></li></ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="span8" id="1">
        <div class="hero-unit">
            <h2><?php echo $xlang['seccion_extra']; ?></h2>
            <?php echo Form::open('system/login.php', 'post', ['class' => 'well'], false); ?>
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