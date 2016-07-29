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
 * Clase para el manejo de cookies.<br><br>
 * Class to handling cookies.
 */
class Cookie {
    
    /**
     * Crea una cookie.<br><br>
     * Creates a cookie.
     * @param string $name El nombre de la cookie.<br>The cookie name.
     * @param mixed $value El valor de la cookie.<br>The cookie value.
     * @param int $expire El tiempo de duración en segundos.<br>The duration time in seconds.
     * @param string $path La ruta.<br>Path.
     * @param string $domain El dominio http://www.ejemplo.com <br>The domain http://www.example.com
     * @param boolean $secure ...
     * @param boolean $httponly ...
     */
    public static function set($name, $value = null, $expire = 0, $path = null, $domain = null, $secure = false, $httponly = false){
        if($expire == 0){
            $expire = 0;
        } else {
            $expire = time() + $expire;
        }        
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }
    
    /**
     * Devuelve una cookie.<br><br>
     * Returns a cookie.
     * @param string $value El nombre de la cookie.<br>The cookie name.
     * @return session|boolean Solo si la cookie no existe devuelve <b>false</b>.Only if the cookie doesn't exist returns <b>false</b>.
     */
    public static function get($value){
        if(isset($_COOKIE[$value])){
            return $_COOKIE[$value];
        } else {
            return false;
        }
    }
    
    /**
     * Elimina una cookie.<br><br>
     * Removes a cookie.
     * @param string $name El nombre de la cookie.<br>The cookie name.
     */
    public static function delete($name){
        $expire = time() - 3600;
        setcookie($name, '', $expire);
    }
    
}