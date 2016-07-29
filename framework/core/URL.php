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
 * Obtiene la URL de la aplicación.<br><br>
 * Gets the URL of the application.
 */
class URL {
 
    /**
     * Devuelve la url base de la aplicación, ej: http://www.mipagina.com/ <b>¡No eliminar ni modificar!</b><br><br>
     * Returns the base url of webapp, ex: http://www.mipage.com/ <b>Not delete or modify!</b>
     * @param string $url Agregar controlador, métodos y parámetros a la url, ej: http://www.mipagina.com/controlador/metodo/params <br>Add controller, methods and params to url, ex: http://www.mipage.com/controller/method/params
     * @return string URL.
     */
    public static function to($url = ''){
        return URL.$url;
        /* $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://'; // checking if the https is enabled
        $baseUrl.= isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : getenv('HTTP_HOST'); // checking adding the host name to the website address
        $baseUrl.= isset($_SERVER['SCRIPT_NAME']) ? dirname($_SERVER['SCRIPT_NAME']) : dirname(getenv('SCRIPT_NAME')); // adding the directory name to the created url and then returning it.
        $base = $baseUrl;
        if(!strrchr('/', $base)){
            return $base.= '/'.$url;            
        } else {
            return $base.= $url;
        } */
    }

    /**
     * Devuelve la url base de los assets(css, js, img). <b>¡No eliminar ni modificar!</b><br><br>
     * Returns the base url of assets(css, js, img). <b>Not delete or modify!</b>
     * @param string $asset Tu css, js, img... a cargar.<br>Your css, js, img... to load.
     * @return string URL de assets.<br>Assets URL.
     */
    public static function assets($asset = ''){
        return URL.ASSETS.$asset;
        /* $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://'; // checking if the https is enabled
        $baseUrl.= isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : getenv('HTTP_HOST'); // checking adding the host name to the website address
        $baseUrl.= isset($_SERVER['SCRIPT_NAME']) ? dirname($_SERVER['SCRIPT_NAME']) : dirname(getenv('SCRIPT_NAME')); // adding the directory name to the created url and then returning it.
        return $baseUrl.= '/'.ASSETS.$asset; */
    }
    
}