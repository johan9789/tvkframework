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
 * @since 1.0.1
 * @version 1.0.2
 * 
 */

/**
 * Clase para cargar todas las clases en la aplicación.<br><br>
 * Class to load all classes in the app.
 */
class Autoload {

    /**
     * Instancia la clase Autoload y ejecuta el método 'start'.<br><br>
     * Instantiate the Autoload class and run the 'start' method.
     */
    public static function start(){
        $autoload = new Autoload();
        $autoload->run();
    }
    
    /**
     * Realiza la autocarga de clases completamente.<br><br>
     * Realizes autoloading classes completely.
     */
    private function run(){
        $this->first();
        $this->core();
        $this->database();
        $this->libraries();
        $this->helpers();
    }
    
    /**
     * Carga funciones útiles para la aplicación y las constantes necesarias.<br>
     * Loads useful functions for the app and necesary constants.<br>
     */
    private function first(){
        require_once SYSTEM.'core/Errors.php';
        require_once 'app/config/database.php';
        require_once 'app/config/keys.php';
        require_once 'app/config/filters.php';        
        require_once SYSTEM.'core/Functions.php';
        require_once SYSTEM.'libraries/Twig/Autoloader.php';            
    }
    
    /** 
     * Carga las clases que hacen posible iniciar la aplicación.<br><br>
     * Loads the classes that enable start the app.
     */
    private function core(){
        spl_autoload_register(function($class){
            $file = SYSTEM.'core/'.$class.'.php';
            if(file_exists($file)){
                require_once $file;
            }
        });
    }
    
    /** 
     * Carga las clases para la conexión a las bases de datos.<br><br>
     * Loads the databases connection classes.
     */
    private function database(){
        spl_autoload_register(function($class){
            $file = SYSTEM.'database/'.$class.'.php';
            if(file_exists($file)){
                require_once $file;
            }
        });
    }
    
    /**
     * Carga las librerias a utilizar.<br><br>
     * Loads the libraries to use.
     */
    private function libraries(){
        spl_autoload_register(function($class){
            $file = SYSTEM.'libraries/'.$class.'.php';
            if(file_exists($file)){
                require_once $file;
            }
        });
    }
    
    /**
     * Carga los helpers.<br><br>
     * Loads the helpers.
     */
    private function helpers(){
        spl_autoload_register(function($class){
            $file = SYSTEM.'helpers/'.$class.'.php';
            if(file_exists($file)){
                require_once $file;
            }
        });
    }

}