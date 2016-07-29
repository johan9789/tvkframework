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
 * Página para la creación de un C.R.U.D.
 * Page to create a C.R.U.D.
 */
require_once '../config.php';
require_once '../../app/config/paths.php';
require_once '../../app/config/other.php';
spl_autoload_register(function($class){
    if(file_exists("../../".SYSTEM."libraries/$class.php")){
        require_once "../../".SYSTEM."libraries/$class.php";
    }
});
require_once '../../'.SYSTEM.'util/Functions.php';
spl_autoload_register(function($class){
    if(file_exists("../../".SYSTEM."helpers/$class.php")){
        require_once "../../".SYSTEM."helpers/$class.php";
    }
});
require_once 'lang.php';
require_once 'classes/FormX.php';

Session::start();
if(Session::get('xxtra_adm_us') == false){
    Redirect::other('../index.php');
}

if($adm_auth['active'] == false){
    Redirect::to();
}

$formx = new FormX();
$options = $formx->get_options();
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
<?php echo HTML::script('../assets/js/forms.js', false); ?>
</style>
</head>
<body>

<?php if(Session::get('html5_created_form') != null): ?>
<div id="window-html5-form" style="display: none; width: 300px; position: absolute; top: 230px; left: 50%; margin-left: -128px;">
    <div id="contenedor">
        <div class="contenido">            
            <?php echo Session::get('html5_created_form'); ?>            
        </div>
    </div>    
</div>    
<script type="text/javascript">
$(function(){
    $('#window-html5-form').fadeIn(1500);
});
</script>    
<?php Session::delete('html5_created_form'); ?>
<?php endif; ?>
    
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">                
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class=""><?php echo HTML::link('home.php', $xlang['inicio'], null, false); ?></li>
                    <li class=""><?php echo HTML::link('crud.php', 'CRUD', null, false); ?></li>
                    <li class=""><?php echo HTML::link('controllers.php', $xlang['controladores'], null, false); ?></li>
                    <li class=""><?php echo HTML::link('models.php', $xlang['modelos'], null, false); ?></li>
                    <li class="active"><?php echo HTML::link('forms.php', $xlang['formularios'], null, false); ?></li>
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
    <span id="xlang_fm_name" class="<?php echo $xlang['fm_name']; ?>"></span>
    <span id="xlang_fm_type" class="<?php echo $xlang['fm_type']; ?>"></span>
    <span id="xlang_optional" class="<?php echo $xlang['optional']; ?>"></span>
    <section>     
        <?php echo Form::open('gen_form.php', 'post', ['id' => 'gen_form'], false); ?>
        <h3>
            <span class="show_crud_act_rec" style="cursor: pointer;">
                <?php echo $xlang['gen_form']; ?> ... 
                <?php echo Form::text('name_form', '', true, ['style' => 'font-size: 17px;', 'placeholder' => $xlang['name_form'], 'autocomplete' => 'off']); ?>
                <?php echo Form::select('type_form', $xlang['type_form'], true, ['style' => '']); ?>
            </span>
        </h3>
        <?php for($i=0;$i<4;$i++): ?>
        <h4 id="fm_all_name">
            <?php echo $xlang['fm_name']; ?>: 
            <?php echo Form::text('text_form[]', '', false, ['id' => 'text_form', 'style' => 'font-size: 16px;', 'autocomplete' => 'off']); ?>
            <?php echo $xlang['fm_type']; ?>:
            <?php echo Form::select('select_form[]', $options, false, ['id' => 'select_form', 'style' => 'font-size: 17px;']); ?>
            <?php echo Form::text('options[]', '', false, ['placeholder' => $xlang['optional'], 'style' => 'width: 230px;', 'autocomplete' => 'off']); ?>
        </h4>
        <?php endfor; ?>        
        <?php echo Form::button($xlang['f_add'], '', ['id' => 'add_val']); ?>
        <?php echo Form::submit($xlang['gen_t'], 'gen_form_submit', ['id' => 'gen_form_submit']); ?>
        <?php echo Form::close(); ?>
        <?php echo '<pre>'. print_r(get_class_methods('Form')); echo '</pre>'; ?>
    </section>
</div>

</body>
</html>