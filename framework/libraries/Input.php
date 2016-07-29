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
 * Clase para el manejo de recibo de datos vía $_POST y también $_GET.<br><br>
 * Class for handling receipt of data via $_POST and $_GET too.
 */
class Input {
    
    /**
     * Devuelve $_GET[$get].<br><br>
     * Returns $_GET[$get].
     * @param string $get Parámetro para $_GET.<br>Parameter to $_GET.
     * @return get $_GET[$get].
     */
    public static function get($get){
        return $_GET[$get];
    }

    /**
     * Devuelve $_POST[$post].<br><br>
     * Returns $_POST[$post].
     * @param string $post Parámetro para $_POST.<br>Parameter to $_POST.
     * @return post $_POST[$post].
     */
    public static function post($post){
        return $_POST[$post];
    }
    
    /**
     * Devuelve <b>true</b> si todos los elementos indicados vía $_POST existen(isset()) 
     * y devuelve <b>false</b> si solo uno no existe.<br><br>
     * Returns <b>true</b> if all elements indicated via $_POST exist(isset()) 
     * and returns <b>false</b> if just one doesn't exist.
     * @param array $data Cada elemento de $_POST para comprobar.<br>Each element $_POST to check.
     * @return boolean 
     */
    public static function exist(array $data){        
        $condition = true;
        foreach($data as $value){
            if(!isset($_POST[$value])){
                $condition = false;
                break;
            }
        }
        return $condition;
    }

    /**
     * Devuelve <b>true</b> si todos los elementos indicados vía $_POST no están vacíos(!empty()) 
     * y devuelve <b>false</b> si solo uno esta vacío.<br><br>
     * Returns <b>true</b> if all elements indicated via $_POST aren't empty(!empty()) 
     * and returns <b>false</b> if just one is empty.
     * @param array $data Cada elemento de $_POST para comprobar.<br>Each element $_POST to check.
     * @return boolean
     */
    public static function not_empty(array $data){
        $condition = true;
        foreach($data as $value){
            if(empty($_POST[$value])){
                $condition = false;
                break;
            }
        }
        return $condition;
    }
    
    /**
     * Devuelve <b>true</b> si todos los elementos indicados vía $_POST existen y no están vacíos(!empty()) 
     * y devuelve <b>false</b> si solo uno esta vacío o no existe.<br><br>
     * Returns <b>true</b> if all elements indicated via $_POST exist and aren't empty(!empty()) 
     * and returns <b>false</b> if just one is empty or does not exist.
     * @param array $data Cada elemento de $_POST para comprobar.<br>Each element $_POST to check.
     * @return boolean
     */
    public static function exist_not_empty(array $data){
        $condition = true;
        foreach($data as $value){
            if(!isset($_POST[$value]) || empty($_POST[$value])){
                $condition = false;
                break;
            }
        }
        return $condition;
    }
    
    /**
     * Devuelve <b>true</b> si todos los elementos enviados vía $_POST existen y no están vacíos(!empty()) 
     * y devuelve <b>false</b> si solo uno esta vacío o no existe.<br><br>
     * Returns <b>true</b> if all elements sent via $_POST exist and aren't empty(!empty()) 
     * and returns <b>false</b> if just one is empty or does not exist.
     * @return boolean
     */
    public static function all_not_empty(){
        $condition = true;
        foreach($_POST as $a){
            if(!isset($a) || empty($a)){
                $condition = false;
                break;
            }
        }
        return $condition;
    }
    
    /**
     * Compara si el valor de un $_POST recibido es igual a lo indicado.<br><br>
     * Compares if received $_POST value equals indicated.
     * @param array $data Array de datos.<br><br>Data array.
     */
    public static function compare(array $data){
        $condition = true;
        foreach($data as $key => $value){
            if($_POST[$key] != $value){
                $condition = false;
                break;
            }
        }
        return $condition;
    }
        
    /**
     * Devuelve un arreglo con el contenido de $_POST o $_GET.<br><br>
     * Returns an array with $_POST or $_GET content.
     * @param string $type Si es post o get.<br>Can be post or get.
     * @return array Array creado.<br>Created array.
     */
    public static function all($type = 'post'){
        if($type == 'post'){
            return $_POST;
        } elseif($type == 'get'){
            return $_GET;
        }
    }
    
}