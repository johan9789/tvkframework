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
class ActiveRecord extends Relational {
    
    /**
     * 
     * @return type
     */
    public function all(){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        }
        return $this->table($class);
    }        
    
    /**
     * 
     * @param array $data
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
     * 
     * @param array $where
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
     * 
     * @param type $id
     * @param type $limit
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
     * 
     * @param array $where
     * @return type
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
     * 
     * @param type $id
     * @return type
     */
    public function findOne($id){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        } 
        $pk = $this->primary_key($class);
        $where = [$pk => $id];
        $find = parent::where($class, $where);
        return $find[0];
    }
    
    /**
     * 
     * @param type $field
     * @param type $condition
     * @param type $value
     * @return type
     */
    /*public function where($field, $condition, $value){
        $class = null;
        if(isset($this->table)){
            $class = $this->table;
        } else {
            $class = get_class($this);
        } 
        $stm = $this->prepare("select * from $class where $field $condition :value");
        $stm->execute(array('value' => $value));
        $data = $stm->fetchAll(Database::FETCH_SQL);
        return $data;
    }*/
    
}