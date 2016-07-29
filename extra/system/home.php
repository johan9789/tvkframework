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
 * Página inicial de la sección extra.
 * Extra section main page.
 */
require_once '../config.php';
require_once '../../app/config/paths.php';
require_once '../../app/config/other.php';
spl_autoload_register(function($class){
    if(file_exists("../../".SYSTEM."libraries/$class.php")){
        require_once "../../".SYSTEM."libraries/$class.php";
    }
});
require_once '../../framework/util/Functions.php';
spl_autoload_register(function($class){
    if(file_exists("../../".SYSTEM."helpers/$class.php")){
        require_once "../../".SYSTEM."helpers/$class.php";
    }
});
require_once 'lang.php';

Session::start();
if(Session::get('xxtra_adm_us') == false){
    Redirect::other('../index.php');
}

if($adm_auth['active'] == false){
    Redirect::to();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $xlang['titulo_principal']; ?></title>
<?php echo HTML::style('../assets/css/metro-bootstrap.css', false); ?>
<?php echo HTML::style('../assets/css/apprise.css', false); ?>
<?php echo HTML::style('../assets/css/jquery-ui.css', false); ?>
<?php echo HTML::script('../assets/js/jquery.js', false); ?>
<?php echo HTML::script('../assets/js/jquery-ui.js', false); ?>
<?php echo HTML::script('../assets/js/apprise.js', false); ?>
<?php echo HTML::script('../assets/js/home.js', false); ?>
</style>
</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">                
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><?php echo HTML::link('home.php', $xlang['inicio'], null, false); ?></li>
                    <li class=""><?php echo HTML::link('crud.php', 'CRUD', null, false); ?></li>
                    <li class=""><?php echo HTML::link('controllers.php', $xlang['controladores'], null, false); ?></li>
                    <li class=""><?php echo HTML::link('models.php', $xlang['modelos'], null, false); ?></li>
                    <li class=""><?php echo HTML::link('forms.php', $xlang['formularios'], null, false); ?></li>
                    <li class=""><?php echo HTML::link('logout.php', $xlang['cerrar_sesion'], null, false); ?></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>   
    
<div class="container">    
    <header class="jumbotron subhead" id="overview">
        <br>
        <div class="subnav">
            <ul class="nav nav-pills">
                <li><a href="#typography"></a></li>
                <li class=""><a href="#code"></a></li>
                <li class=""><a href="#tables"></a></li>
                <li class=""><a href="#forms"></a></li>
            </ul>
        </div>
    </header>
    <section>            
        <br><br>
        <h3><span class="show_crud_act_rec" style="cursor: pointer;"><?php echo $xlang['welcome']; ?></span></h3>
        <br><br>
        <h3><?php echo $xlang['version']; ?></h3>
    </section>
    <br><br><br>
    <footer class="bs-footer" role="contentinfo">
        <div class="container">
            <h4 id="copyrigth">&copy; 2014 - <?php echo $xlang['created_by']; ?> Johan Pineda</h4>
        </div>
    </footer>
</div>

</body>
</html>