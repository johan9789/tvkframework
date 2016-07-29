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
 * Clase para el manejo de tablas de la base de datos como objetos.<br><br>
 * Class for handling tables database as objects.
 */
class ActiveRecord extends Relational {
    
    /**
     * Devuelve todos los datos.<br><br>
     * Returns all data.
     * @return array Todos los datos.<br>All data.
     * @since 1.0.2
     */
    public static function all(){
        $class = get_called_class();
        $haha = new $class;
        return $haha->_all();
    }
    
    /**
     * Devuelve todos los datos.<br><br>
     * Returns all data.
     * @return array Todos los datos.<br>All data.
     */
    private function _all(){
        $class = null;  
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        }
        return $this->table($class);
    }        
    
    /**
     * Devuelve los datos indicando cualquier campo a usar en la condición 'where'.<br><br>
     * Returns data indicating any field to use in the condition 'where'.
     * @param array $where array(field, condition, value);
     * @return array Datos devueltos.<br>Returned data.
     */
    public function find(array $where){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        } 
        return $this->where($class, $where);
    }
            
    /**
     * Devuelve los datos indicando el id a usar en la condición 'where'.<br><br>
     * Returns data indicating the id to use in the condition 'where'.
     * @param mixed $id ID
     * @return array Datos devueltos.<br>Returned data.
     * @since 1.0.2
     */
    public static function findOne($id){
        $class = get_called_class();
        $haha = new $class;
        return $haha->_findOne($id);
    }
    
    /**
     * Devuelve los datos indicando el id a usar en la condición 'where'.<br><br>
     * Returns data indicating the id to use in the condition 'where'.
     * @param mixed $id ID
     * @return array Datos devueltos.<br>Returned data.
     */
    private function _findOne($id){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        } 
        $pk = $this->primary_key($class);
        $where = [$pk => $id];
        $find = $this->where($class, $where);
        return $find[0];
    }
    
    /**
     * Inserta datos.<br><br>
     * Insert data.
     * @param array $data Datos a insertar.<br>Data to insert.
     */
    public function create(array $data = null){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        }     
        if(is_null($data)){
            $create = get_object_vars($this);
            unset($create['table']);
            $this->insert($class, $create);
        } else {
            $this->insert($class, $data);
        }
    }
    
    /**
     * Actualiza un registro indicando el id.<br><br>
     * Updates a row indicating the id.
     * @param mixed $id ID.
     */
    public function save($id){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        } 
        $save = get_object_vars($this);
        unset($save['table']);
        $pk = $this->primary_key($class);
        $where = [$pk => $id];
        $this->update($class, $save, $where);
    }
    
    /**
     * Elimina un registro indicando el id.<br><br>
     * Deletes a row indicating the id.
     * @param mixed $id ID
     * @param int $limit LIMIT
     */
    public function remove($id, $limit = 1){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        } 
        $pk = $this->primary_key($class);
        $where = [$pk => $id];
        $this->delete($class, $where, $limit);
    }
    
    /**
     * Devuelve los datos indicando la condición 'where'.<br><br>
     * Returns data indicating the condition 'where'.
     * @param mixed $field El campo.<br>The field.
     * @param mixed $condition La condición.<br>The condition.
     * @param mixed $value Valor a buscar.<br>Value to search.
     * @return array Datos devueltos.<br>Returned Data.
     * @since 1.0.2
     */
    public static function wheree($field, $condition, $value){
        $class = get_called_class();
        $haha = new $class;
        return $haha->_where($field, $condition, $value);
    }
    
    /**
     * Devuelve los datos indicando la condición 'where'.<br><br>
     * Returns data indicating the condition 'where'.
     * @param mixed $field El campo.<br>The field.
     * @param mixed $condition La condición.<br>The condition.
     * @param mixed $value Valor a buscar.<br>Value to search.
     * @return array Datos devueltos.<br>Returned Data.
     */
    private function _wheree($field, $condition, $value){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        }
        $pdo = new SQLConnection();
        $connection = $pdo->connection();
        $stm = $connection->prepare("select * from $class where $field $condition :value");
        $stm->execute(array('value' => $value));
        $data = $stm->fetchAll(FETCH_SQL);
        return $data;
    }
    
}