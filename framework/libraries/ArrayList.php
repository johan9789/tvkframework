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
 * Esta clase permite guardar datos en un 'array' pero orientado a objetos.<br><br>
 * This class allows you to store data in an 'array', but object-oriented.
 */
class ArrayList {
    /**
     * Contiene el arraylist.<br><br>
     * Contains the arraylist.
     * @var array 
     */
    private $list;
 
    /**
     * Inicializa el arraylist.<br><br>
     * Initializes the arraylist.
     */
    public function __construct(){
        $this->list = [];
    }

    /**
     * Agrega un valor nuevo al arraylist, el valor puede ser cualquier tipo de variable.<br><br>
     * Adds a value to the arraylist, the value can be any var type.     
     * @param mixed $value Valor a agregar.<br>Value to add.
     */
    public function add($value){
        $this->list[] = $value;
    }
 
    /**
     * Limpia el arraylist.<br><br>
     * Cleans the arraylist.
     */
    public function clear(){
        $this->list = [];
    }
 
    /**
     * Busca si algún elemento del arraylist tiene un valor igual al parámetro enviado.<br><br>
     * Searches if some element of the arraylist has a value equals the send parameter.
     * @param mixed $value Valor a buscar.<br>Value to search.
     * @return boolean Devuelve <b>true</b> si existe o <b>false</b> si no existe.<br>Returns <b>true</b> if exists or <b>false</b> if not exists.
     */
    public function contains($value){
        return(in_array($value, $this->list));
    }
 
    /**
     * Devuelve el elemento encontrado en la posición <b>$index</b>.<br><br>
     * Returns the found element at position <b>$index</b>.
     * @param int $index Posicion del elemento a buscar.<br>Element position to search.
     * @return boolean|null
     */
    public function get($index){
        if(is_int($index)){
            if(isset($this->list[$index])){
                return $this->list[$index];
            } else {
                return null;
            }
        } else {
            exit("The index '$index' is not an integer.");
        }
    }
    
    /**
     * Devuelve la posición del elemento buscado. Si el elemento no es encontrado, devuelve -1.<br><br>
     * Returns the position of the element searched, if the element isn't found, return -1.
     * @param mixed $search Elemento para buscar.<br>Elemento to search.
     * @return int
     */
    function indexOf($search){
        foreach($this->list as $key => $value){
            $current_key = $key;
            if($search === $value OR (is_array($value) && recursive_array_search($search, $value) !== false)){
                return $current_key;
            }
        }
        return -1;
    }
    
    /**
     * Devuelve <b>true</b> si el arraylist está vacío, <b>false</b> si no está vacío.<br><br>
     * Returns <b>true</b> if the arraylist is empty, <b>false</b> if arraylist is not empty.
     * @return boolean
     */
    public function isEmpty(){
        return(count($this->list) == 0);
    }
    
    /**
     * Elimina el elemento del arraylist en la posición <b>$index</b>.<br><br>
     * Removes the element of the arraylist in the position <b>$index</b>.
     * @param int $index Posición del elemento.<br>Element position.
     */
    public function remove($index){
        if(isset($this->map[$index]) || array_key_exists($index, $this->list)){
            unset($this->map[$index]);
        } else {
            exit("The index '$index' was not found.");
        }
    }
 
    /**
     * Elimina un elemento del arraylist, este método no elimina por la posición.<br><br>
     * Removes an element of arraylist, this method doesn't remove by position.
     * @param mixed $element El elemento.<br>The element.
     * @return boolean :D
     */
    public function removeElement($element){
        $key = array_search($element, $this->list, true);
        if($key !== false){
            unset($this->list[$key]);
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * En proceso para que funcione correctamente...<br><br>
     * In proccess...
     * @param int $index Posición del elemento.<br>Element position.
     * @param mixed $element Valor del elemento.<br>Element value.
     */
    public function set($index, $element){
        if(is_int($index)){
            $this->map[$index] = $element;
        } else {
            exit("The index '$index' isn't an integer.");
        }
    }
 
    /**
     * Devuelve la cantidad de elementos del arraylist.<br><br>
     * Returns a count of elements of the arraylist.
     * @return int
     */
    public function size(){
        return count($this->list);
    }
 
    /**
     * Devuelve el arraylist como un array.<br><br>
     * Returns the arraylist as an array.
     * @return array
     */
    public function toArray(){
        return $this->list;
    }
 
}