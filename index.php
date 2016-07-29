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
 * Carga funciones útiles para la aplicación y las constantes necesarias.
 * Loads useful functions for the app and necesary constants.
 */
require_once 'error.php';
require_once 'app/config/paths.php';
require_once 'app/config/database.php';
require_once 'app/config/other.php';
// require_once SYSTEM.'util/Functions.php';
require_once SYSTEM.'libraries/Twig/Autoloader.php';
/** 
 * Carga las clases que hacen posible iniciar la aplicación.
 * Loads the classes that enable start the app.
 */
spl_autoload_register(function($class){
    $file = SYSTEM.'core/'.$class.'.php';
    if(file_exists($file)){
        require_once $file;
    }
});

/** 
 * Carga las clases para la conexión a las bases de datos.
 * Loads the databases connection classes.
 */
spl_autoload_register(function($class){
    $file = SYSTEM.'database/'.$class.'.php';
    if(file_exists($file)){
        require_once $file;
    }
});

/**
 * Carga las librerias a utilizar.
 * Loads the libraries to use.
 */
spl_autoload_register(function($class){
    $file = SYSTEM.'libraries/'.$class.'.php';
    if(file_exists($file)){
        require_once $file;
    }
});

/**
 * Carga los helpers.
 * Loads the helpers.
 */
spl_autoload_register(function($class){
    $file = SYSTEM.'helpers/'.$class.'.php';
    if(file_exists($file)){
        require_once $file;
    }
});

/**
 * Inicia toda la aplicación.
 * Starts entire application.
 */
$app = new Bootstrap();
$app->start();