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

require_once '../config.php';
require_once 'mysql.php';
require_once 'lang.php';
require_once '../../app/config/paths.php';
require_once '../../'.SYSTEM.'libraries/Input.php';
require_once '../../'.SYSTEM.'core/App.php';
spl_autoload_register(function($class){
    require_once "classes/$class.php";
});

$rec_crud = Input::all();
$name_crud = $rec_crud['name_crud'];
$table_crud = $rec_crud['table_crud'];
$mayus_name_crud = ucfirst($name_crud);
$mayus_table_crud = ucfirst($table_crud);

if($table_crud == 'undefined'){
    exit($xlang['selecciona_tabla']);
}

if($name_crud == $table_crud){
    exit($xlang['crud_igual_tabla']);
}

$mysql = new Mysql();
$pk_table = $mysql->primary_key($table_crud);
$fields_table = $mysql->fields($table_crud);

$model = new ModelX();
$ya_existe_m = $xlang['modelo_ya_existe'];
$model->active_record($table_crud, $mayus_table_crud, $ya_existe_m);

$controller = new ControllerX();
$ya_existe_crud = $xlang['crud_ya_existe'];
$controller->active_record($name_crud, $mayus_name_crud, $table_crud, $mayus_table_crud, $pk_table, $fields_table, $ya_existe_crud);

$view = new ViewX();
$view->gen_metro_bootstrap();
$view->index_active_record($name_crud, $table_crud, $mayus_table_crud, $fields_table, $pk_table);
$view->edit_active_record($name_crud, $table_crud, $mayus_table_crud, $fields_table, $pk_table);

echo $xlang['crud_creado'];