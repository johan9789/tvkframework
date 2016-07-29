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
 * @version 1.0.2
 * 
 */

/**
 * Carga la clase autoload.
 * Load autoload class.
 */
require_once realpath('').'/app/config/paths.php';
require_once realpath('').'/'.SYSTEM.'core/Autoload.php';
Autoload::start();

/**
 * Inicia toda la aplicación.
 * Starts entire application.
 */

$app = new App();
$app->start();