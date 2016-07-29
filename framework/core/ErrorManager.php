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
 * Clase para el manejo de errores.<br><br>
 * Class to manage errors.
 */
class ErrorManager {
    
    /**
     * Mostrar página de error especial.<br><br>
     * Display especial error page.
     * @param string $error_view Página de error.<br>Error page.
     * @param array $data Datos a la vista de error.<br>Data to error view.
     */
    public function render($error_view, array $data = array()){
        $error_page = SYSTEM.'pages/'.$error_view.'.php';
        if(file_exists($error_page)){
            extract($data);
            require $error_page;
        } else {
            require realpath('../').'/'.$error_page;
        }
        exit();
    }
    
    /**
     * Mostrar página de error usando los layouts.<br><br>
     * Display especial error page using layouts.
     * @param string $error_view Página de error.<br>Error page.
     * @param array $data Datos a la vista de error.<br>Data to error view.
     */
    public function template($error_view, array $data = array()){
        if(file_exists('app/views/'.$error_view.'.php')){
            extract($data);
            require 'app/views/layouts/header.php';
            require 'app/views/'.$error_view.'.php';
            require 'app/views/layouts/footer.php';
        } else {
            $error = new ExecuteError();
            $error->not_view($error_view);
        }
        exit();
    }
    
}