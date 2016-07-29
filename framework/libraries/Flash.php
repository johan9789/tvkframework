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
 * Muestra mensajes 'flash'.<br><br>
 * Displays 'flash' messages.
 */
class Flash {

    /**
     * Crea el mensaje 'flash'.<br><br>
     * Creates the 'flash' message.
     * @param string $name Nombre del mensaje.<br>Message name.
     * @param mixed $message Mensaje.<br>Message.
     */
    public static function set($name, $message){
        setcookie('flash_tvk_m'.$name, $message, time() + 1);
    }
    
    /**
     * Obtiene el mensaje 'flash'.<br><br>
     * Gets the 'flash' message.
     * @param string $name Nombre del mensaje.<br>Message name.
     * @return mixed Contenido del mensaje.<br>Message content.
     */
    public static function get($name){
        return $_COOKIE['flash_tvk_m'.$name];
    }
    
    /**
     * Verifica si existe el mensaje 'flash'.<br><br>
     * Check if there is a 'flash' message.
     * @param string $name Nombre del mensaje.<br>Message name.
     * @return boolean 'True' si el mensaje existe, 'false' si no.<br>'True' if the message exists, 'false' if not.
     */
    public static function has($name){
        return(isset($_COOKIE['flash_tvk_m'.$name]));
    }
    
}