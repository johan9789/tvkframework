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
 * Clase View.<br><br>
 * View class.
 */
class View {
    
    /**
     * Carga el archivo de una vista en tu controlador.<br><br>
     * Loads the view file in your controller.
     * @param string $name El nombre del archivo a cargar.<br>The file name to load.
     * @param array $data Variables a incluir en la vista.<br>Variables to include in the view.
     */
    public static function render($name, array $data = array()){       
    	if(!is_null($data)){
            extract($data);
        }
        if(file_exists('app/views/'.$name.'.php')){
            require 'app/views/'.$name.'.php';
        } else {
            require_once 'app/errors/error.php';
            $error = new Error();
            $error->not_view($name);
        }
    }
    
    /**
     * Carga el archivo de una vista y los layouts en tu controlador.<br><br>
     * Loads the view file and layouts in your controller.
     * @param string $name El nombre del archivo a cargar.<br>The file name to load.
     * @param array $data Variables a incluir en la vista.<br>Variables to include in the view.
     */
    public static function template($name, array $data = array()){
        if(!is_null($data)){
            extract($data);
        }
        if(file_exists('app/views/'.$name.'.php')){
            require 'app/views/layouts/header.php';
            require 'app/views/'.$name.'.php';
            require 'app/views/layouts/footer.php';
        } else {
            require_once 'app/errors/error.php';
            $error = new Error();
            $error->not_view($name);
        }
    }

    /**
     * Carga una vista, pero se debe indicar la ruta absoluta.<br><br>
     * Loads a view, but should indicate the absolute path.
     * @param string $name El nombre del archivo a cargar.<br>The file name to load.
     * @param array $data Variables a incluir en la vista.<br>Variables to include in the view.
     */
    public function render_x($name, array $data = array()){
        if(!is_null($data)){
            extract($data);
        }
        if(file_exists($name.'.php')){
            require $name.'.php';
        } else {
            require_once 'app/errors/error.php';
            $error = new Error();
            $error->not_view($name);
        }
    }
    
    public static function test($name, array $data = array()){
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('app/views');
        $twig = new Twig_Environment($loader, array('app/cache' => 'cache', 'debug' => 'true'));
        $template = $twig->loadTemplate($name.'.php');
        echo $template->render($data);
    }

    public static function get_include_contents($filename) {
        if(is_file($filename)) {
            ob_start();
            include $filename;
            return ob_get_clean();
        }
        return false;
    }
    
    public static function test2($name, array $data = array()){
        if(!is_null($data)){
            extract($data);
        }
        if(file_exists('app/views/'.$name.'.php')){
            echo View::return_view('test2');
            // $content = file_get_contents('app/views/'.$name.'.php');
            /* $content = require_once 'app/views/'.$name.'.php';            
            require 'app/views/layouts/main.php';  */
        } else {
            require_once 'app/errors/error.php';
            $error = new Error();
            $error->not_view($name);
        }
    }
    
    public static function return_view($name){
        return require_once 'app/views/'.$name.'.php';
    }

}