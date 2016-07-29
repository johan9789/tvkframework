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
class Builder extends PDO {
    private $my_query = '';
    private $params = array();
    
    public function __construct(){
        try {                            
            parent::__construct(MYSQL_DRIVER.':host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE.';port='.MYSQL_PORT, MYSQL_USER, MYSQL_PASSWORD); 
            $this->exec("set names utf8");
        } catch(PDOException $e){
            $error_db = 'app/errors/error_db.php';
            if(file_exists($error_db)){
                require_once $error_db;
                $error = new Error_DB();
                $error->connection($e->getMessage(), $e->getFile(), $e->getTrace());
            } else {
                require_once realpath('../../').'/'.$error_db;
                $error = new Error_DB();
                $error->connection($e->getMessage(), $e->getFile(), $e->getTrace());
            }
        }
    }

    public static function start(){
        $builder = new Builder();
        return $builder;
    }
    
    /**
     * 
     * @param type $my_fields
     * @return \QueryBuilder
     */
    public function select($my_fields = '*'){
        if($my_fields == '*'){
            $this->my_query = "SELECT $my_fields";
        } else {
            $this->my_query = "SELECT ";
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
     * @return \QueryBuilder
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
     * @return \QueryBuilder
     */
    public function where($w_field, $w_condition, $w_search){
        $this->my_query.= " WHERE $w_field $w_condition ?";
        $this->params[] = $w_search;
        return $this;
    }
    
    /**
     * 
     * @param type $a_field
     * @param type $a_condition
     * @param type $a_search
     * @return \QueryBuilder
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
     * @return \QueryBuilder
     */
    public function or_($o_field, $o_condition, $o_search){
        $this->my_query.= " OR $o_field $o_condition ?";
        $this->params[] = $o_search;
        return $this;
    }
    
    /**
     * 
     * @param type $j_table
     * @return \QueryBuilder
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
     * @return \QueryBuilder
     */
    public function on($o_field, $o_condition, $o_compare){
        $this->my_query.= " ON $o_field $o_condition $o_compare";
        return $this;
    }
    
    public function order_by($field){
        $this->my_query.= " ORDER BY $field";
        return $this;
    }

    public function group_by($field){
        $this->my_query.= " GROUP BY $field";
        return $this;
    }

    /**
     * 
     * @param type $extra
     * @return \QueryBuilder
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
        $sth = $this->prepare($this->my_query);
        $sth->execute($this->params);
        $this->my_query = '';
        $this->params = array();
        return $sth->fetchAll(FETCH_SQL);
    }

    public function read(){
        return $this->my_query;
    }
    
}