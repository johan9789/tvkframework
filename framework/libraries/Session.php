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
 * @version 1.0.1
 * 
 */

/**
 * Clase para el manejo de sesiones.<br><br>
 * Class to handling sessions.
 */
class Session {
    
    /**
     * Inicializa la sesión.
     * Initializes the session.
     */
    public static function start(){
        @session_start();
    }
    
    /**
     * Crea una variable de sesión.<br><br>
     * Creates a session var.
     * @param string $key La clave para la sesión.<br>The session key.
     * @param mixed $value El valor de la sesión.<br>The session value.
     */
    public static function set($key, $value){        
        $_SESSION[SESSION_KEY.$key] = $value;
    }
    
    /**
     * Crea una o varias variables de sesión.<br><br>
     * Creates one or more session vars.
     * @param array $data Array de sesiones a crear.<br>Array of sessions to create.
     */
    public static function create(array $data){
        foreach($data as $key => $value){
            $_SESSION[SESSION_KEY.$key] = $value;
        }
    }
    
    /**
     * Devuelve una variable de sesión.<br><br>
     * Returns a session var.
     * @param mixed $key La clave de la variable de sesión
     * @return session|boolean Solo si no existe la sesión devuelve <b>false</b>.<br>Only if not exists the session returns <b>false</b>.
     */
    public static function get($key){
        if(isset($_SESSION[SESSION_KEY.$key])){
            return $_SESSION[SESSION_KEY.$key];
        } else {
            return false;
        }
    }
    
    /**
     * Devuelve un array con todas las sesiones existentes.<br><br>
     * Returns a array with all sessions.
     * @return array Array de sesiones.<br>Session arrays.
     */
    public static function receive(){
        $sessions = [];
        foreach($_SESSION as $key => $value){
            $sessions[$key] = $value;
        }
        return $sessions;
    }

    /**
     * Elimina una variable de sesión.<br><br>
     * Removes a session var.
     * @param type $key La clave de la sesión a eliminar.<br>The key session to delete.
     */
    public static function delete($key){
        unset($_SESSION[SESSION_KEY.$key]);
    }
    
    /**
     * Destruye y finaliza todas las sesiones.<br><br>
     * Destroys and finishes all sessions.
     */
    public static function destroy(){
        @session_start();
        session_destroy();
    }
    
    /**
     * 
     * @param type $value
     * @return type
     * @since 1.0.1
     */
    public function has($value){
        return(isset($_SESSION[SESSION_KEY.$value]));
    }
        
}