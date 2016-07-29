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
        if(!is_null($data)){
            extract($data);
        }
        $error_page = 'framework/pages/'.$error_view.'.php';
        if(file_exists($error_page)){
            require $error_page;
        } else {
            require realpath('../../').'/'.$error_page;
        }
    }
    
}