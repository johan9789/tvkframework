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

require_once '../../app/config/paths.php';
require_once '../config.php';
require_once 'mysql.php';
require_once 'lang.php';
require_once '../../'.SYSTEM.'libraries/Input.php';
require_once 'classes/ModelX.php';

$table_crud = Input::post('table_crud');
$mayus_table_crud = ucfirst($table_crud);

if($table_crud == 'undefined'){
    exit($xlang['selecciona_tabla']);
}

$model = new ModelX();
$ya_existe_m = $xlang['modelo_ya_existe'];
$model->active_record($table_crud, $mayus_table_crud, $ya_existe_m);

echo $xlang['modelo_creado'];