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
 * Esta clase crea una colección 'clave' - 'valor', es otro 'array' orientado a objetos.<br><br>
 * This class creates an collection 'key' - 'value', is another 'array' object-oriented.
 */
class HashMap {
    /**
     * Contiene el hashmap.<br><br>
     * This contains the hashmap.
     * @var array 
     */
    private $map;
 
    /**
     * Initializes the hashnmap.<br><br>
     * Inicializa el hashmap.
     */
    public function __construct(){
        $this->map = array();
    }
 
    /**
     * Limpia el hashmap.<br><br>
     * Cleans the hashmap.
     */
    public function clear(){
        $this->map = array();
    }
 
    /**
     * Clona el hashmap (eso creo...).<br><br>
     * Clones the hashmap (I think...).
     * @return object
     */
    public function clonee(){
        return clone new HashMap();
    }
 
    /**
     * Verifica si el hashmap contiene la clave <b>$key</b>.<br><br>
     * Verifies if the hashmap contains the key <b>$key</b>.
     * @param mixed $key Clave a verificar.<br>Key to verify.
     * @return boolean
     */
    public function containsKey($key){
        return(array_key_exists($key, $this->map));        
    }
 
    /**
     * Verifica si el hashmap contiene el valor <b>$value</b>.<br><br>
     * Verifies if the hashmap contains the value <b>$value</b>.
     * @param mixed $value Valor a verificar.<br>Value to verify.
     * @return boolean
     */
    public function containsValue($value){
        return(in_array($value, $this->map));
    }     
 
    /**
     * Devuelve el elemento que está en la clave <b>$key</b>.<br><br>
     * Returns the element that is in the key <b>$key</b>.
     * @param type $key
     * @return boolean
     */
    public function get($key){
        if(isset($this->map[$key])){
            return $this->map[$key];
        } else {
            exit("The key '$key' doesn't exist.");
        }
    }
 
    /**
     * Devuelve <b>true</b> si el arraylist está vacío, <b>false</b> si no está vacío.<br><br>
     * Returns <b>true</b> if the arraylist is empty, <b>false</b> if arraylist is not empty.
     * @return boolean
     */
    public function isEmpty(){
        return(count($this->map) == 0);
    }     
 
    /**
     * Inserta un nuevo elemento al hashmap.<br><br>
     * Inserts a new element to the hashmap.
     * @param mixex $key La clave a ingresar.<br>The key to insert.
     * @param mixed $value El valor a ingresar.<br>The value to insert.
     */
    public function put($key, $value){
        if(!isset($this->map[$key])){
            $this->map[$key] = $value;
        } else {
            unset($this->map[$key]);
            $this->map[$key] = $value;
        }
    }
 
    /**
     * Elimina el elemento correspondiente a la clave <b>$key</b>.<br><br>
     * Removes the element corresponding to the key <b>$key</b>.
     * @param mixed $key La clave a eliminar.<br>The key to delete.
     */
    public function remove($key){
        if(isset($this->map[$key])){
            unset($this->map[$key]);
        } else {
            exit("The key $key doesn't exist.");
        }
    }
 
    /**
     * Devuelve la cantidad de elementos del hashmap.<br><br>
     * Returns the count of elements of the hashmap.
     * @return int
     */
    public function size(){
        return count($this->map);
    }
 
    /**
     * Devuelve el hashmap como un array.<br><br>
     * Returns the hashmap as an array.
     * @return array
     */
    public function values(){
        return $this->map;
    }
 
}