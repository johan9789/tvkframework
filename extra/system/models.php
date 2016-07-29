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
 * Página para la creación de un Modelo.
 * Page to create a model.
 */
require_once '../config.php';
require_once '../../app/config/paths.php';
require_once '../../app/config/other.php';
spl_autoload_register(function($class){
    if(file_exists("../../".SYSTEM."libraries/$class.php")){
        require_once "../../".SYSTEM."libraries/$class.php";
    }
});
spl_autoload_register(function($class){
    if(file_exists("../../".SYSTEM."helpers/$class.php")){
        require_once "../../".SYSTEM."helpers/$class.php";
    }
});
require_once '../../'.SYSTEM.'util/Functions.php';
require_once 'lang.php';
require_once 'mysql.php';
require_once '../../'.SYSTEM.'core/ErrorManager.php';

Session::start();
if(Session::get('xxtra_adm_us') == false){
    Redirect::other('../index.php');
}

if($adm_auth['active'] == false){    
    Redirect::to();
}

$mysql = new Mysql();
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
<?php echo HTML::script('../assets/js/models.js', false); ?>
</style>
</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">                
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class=""><?php echo HTML::link('home.php', $xlang['inicio'], null, false); ?></li>
                    <li class=""><?php echo HTML::link('crud.php', 'CRUD', null, false); ?></li>
                    <li class=""><?php echo HTML::link('controllers.php', $xlang['controladores'], null, false); ?></li>
                    <li class="active"><?php echo HTML::link('models.php', $xlang['modelos'], null, false); ?></li>
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
        <h4>
            <span id="<?php echo $xlang['model_msj_click']; ?>" class="show_model_act_rec" style="cursor: pointer;"><?php echo $xlang['model_act_rec']; ?></span> | 
            <span id="<?php echo $xlang['model_msj_click']; ?>" class="show_model_rel" style="cursor: pointer;"><?php echo $xlang['model_rel']; ?></span> |
        </h4>
        <table class="table table-striped">
            <tr>
                <th><?php echo $xlang['nombre']; ?></th>
                <th align="center"><?php echo $xlang['seleccionar']; ?></th>
            </tr>
            <?php foreach($mysql->show_tables() as $table): ?>
            <tr>
                <?php foreach($table as $names_tables): ?>
                <td><?php echo $names_tables; ?></td>		                
                <td align="center"><?php echo Form::radio('adm_tb_name', $names_tables, false, true, ['id' => 'adm_tb_name']); ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </table>           
    </section>
</div>

</body>
</html>