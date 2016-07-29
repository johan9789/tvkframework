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
 * 
 */
class Flash {

    /**
     * 
     * @param type $name
     * @param type $message
     */
    public static function set($name, $message){
        setcookie('flash_tvk_m'.$name, $message, time() + 1);
    }
    
    /**
     * 
     * @param type $name
     * @return type
     */
    public static function get($name){
        return $_COOKIE['flash_tvk_m'.$name];
    }
    
    /**
     * 
     * @param type $name
     * @return type
     */
    public static function has($name){
        return(isset($_COOKIE['flash_tvk_m'.$name]));
    }
    
}