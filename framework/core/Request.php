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
 * @since 1.0.2
 * @version 1.0.2
 * 
 */

/**
 * Comprueba las peticiones HTTP de la aplicación.<br><br>
 * Checks HTTP requests from the app.
 */
class Request {
    
    /**
     * Comprueba si la aplicación está recibiendo una petición 'POST'.<br><br>
     * Checks if the application is receiving a request 'POST'.
     * @param string $error_message Mensaje de error.<br>Error message.
     * @param boolean $redirect Si se desea redireccionar a la página principal poner 'true'.<br>If you should redirect to main page, write true.
     * @param string $url URL a redireccionar.<br>URL to redirect.
     */
    public static function post($error_message = 'Error', $redirect = false, $url = ''){
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            if($redirect){
                echo $error_message;
                Redirect::to($url);
            }
            exit($error_message);
        }
    }
    
    /**
     * Comprueba si la aplicación está recibiendo una petición 'GET'.<br><br>
     * Checks if the application is receiving a request 'GET'.
     * @param string $error_message Mensaje de error.<br>Error message.
     * @param boolean $redirect Si se desea redireccionar a la página principal poner 'true'.<br>If you should redirect to main page, write true.
     * @param string $url URL a redireccionar.<br>URL to redirect.
     */
    public static function get($error_message = 'Error', $redirect = false, $url = ''){
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            if($redirect){
                echo $error_message;
                Redirect::to($url);
            }
            exit($error_message);
        }
    }
    
}