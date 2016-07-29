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
 * 
 */
class Builder {
    private $pdo;
    private $connection;
    private $my_query = '';
    private $params = array();    
    
    public function __construct(){
        $this->pdo = new SQLConnection();
        $this->connection = $this->pdo->connection();
    }

    /**
     * 
     * @return \Builder
     */
    public static function start(){
        return new Builder();
    }
    
    /**
     * 
     * @param type $my_fields
     * @return \Builder
     */
    public function select($my_fields = '*'){
        if($my_fields == '*'){
            $this->my_query = 'SELECT *';
        } else {
            $this->my_query = 'SELECT ';
            $fields = func_get_args();
            for($i=0;$i<count($fields);$i++){
                if($i == count($fields) - 1){
                    $this->my_query.= $fields[$i];
                } else {
                    $this->my_query.= $fields[$i].', ';
                }
            }
        }
        return $this;
    }
    
    /**
     * 
     * @param type $my_table
     * @return \Builder
     */
    public function from($my_table){
        $this->my_query.= " FROM $my_table";
        return $this;
    }
    
    /**
     * 
     * @param type $w_field
     * @param type $w_condition
     * @param type $w_search
     * @return \Builder
     */
    public function where($w_field, $w_condition, $w_search){
        $this->my_query.= " WHERE $w_field $w_condition ?";
        $this->params[] = $w_search;
        return $this;
    }
    
    public function where_sub($w_field, $w_condition, $w_sub_query){
        $this->my_query.= " WHERE $w_field $w_condition $w_sub_query";
        return $this;
    }
    
    /**
     * 
     * @param type $a_field
     * @param type $a_condition
     * @param type $a_search
     * @return \Builder
     */
    public function and_($a_field, $a_condition, $a_search){
        $this->my_query.= " AND $a_field $a_condition ?";
        $this->params[] = $a_search;
        return $this;
    }
    
    /**
     * 
     * @param type $o_field
     * @param type $o_condition
     * @param type $o_search
     * @return \Builder
     */
    public function or_($o_field, $o_condition, $o_search){
        $this->my_query.= " OR $o_field $o_condition ?";
        $this->params[] = $o_search;
        return $this;
    }
    
    /**
     * 
     * @param type $j_table
     * @return \Builder
     */
    public function join($j_table){
        $this->my_query.= " JOIN $j_table";
        return $this;
    }
    
    /**
     * 
     * @param type $o_field
     * @param type $o_condition
     * @param type $o_compare
     * @return \Builder
     */
    public function on($o_field, $o_condition, $o_compare){
        $this->my_query.= " ON $o_field $o_condition $o_compare";
        return $this;
    }
    
    /**
     * 
     * @param type $field
     * @return \Builder
     */
    public function order_by($field){
        $this->my_query.= " ORDER BY $field";
        return $this;
    }

    /**
     * 
     * @param type $field
     * @return \Builder
     */
    public function group_by($field){
        $this->my_query.= " GROUP BY $field";
        return $this;
    }

    /**
     * 
     * @param type $extra
     * @return \Builder
     */
    public function extra($extra){
        $this->my_query.= " $extra";
        return $this;
    }
    
    /**
     * 
     * @return type
     */
    public function get(){
        try {
            $sth = $this->connection->prepare($this->my_query);
            $sth->execute($this->params);            
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        $this->my_query = '';
        $this->params = array();
        return $sth->fetchAll(FETCH_SQL);
    }

    /**
     * 
     * @return string
     */
    public function read(){
        return $this->my_query;
    }
    
    /**
     * 
     * @return int
     */
    public function count(){
        return count($this->params);
    }
    
}