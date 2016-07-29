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
 * Realiza consultas a las bases de datos relacionales.<br><br>
 * Realizes queries to relational databases.
 */
class Relational {    
    private $pdo;
    private $connection;    
    
    /**
     * Constructor que realiza la conexión.<br><br>
     * Constructor realizes the connection
     */
    public function __construct(){
        $this->pdo = new SQLConnection();
        $this->connection = $this->pdo->connection();
    }
    
    /**
     * Devuelve la instancia de la clase.<br><br>
     * Returns the instance of the class.
     * @return \Relational
     */
    public static function start(){
        return new Relational();
    }
    
    /**
     * Realiza una consulta y devuelve los resultados.<br><br>
     * Realizes a query and returns the results.
     * @param type $sql
     * @param array $array
     * @return type
     */
    public function query($sql, array $data = array()){
        try {
            $sth = $this->connection->prepare($sql);
            foreach($data as $key => $value){
                $sth->bindValue(":$key", $value);
            }
            $sth->execute();
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        return $sth->fetchAll(FETCH_SQL);
    }
    
    /**
     * Cuenta los resultados de una consulta.<br><br>
     * Counts results of query. 
     * @param type $sql
     * @param array $data
     * @return type
     */
    public function query_row_count($sql, array $data = array()){
        try {
            $sth = $this->connection->prepare($sql);
            $sth->execute($data);
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        return $sth->rowCount();
    }
    
    /**
     * 
     * @param type $sql
     * @param array $data
     */
    public function statement($sql, array $data = array()){
        try {
            $sth = $this->connection->prepare($sql);
            $sth->execute($data);
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
    }

    /**
     * 
     * @param type $select
     * @param type $table
     * @param array $array
     * @return type
     */
    public function select($fields, $table){
        try {
            $sth = $this->connection->prepare("select $fields from $table");
            $sth->execute();
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        return $sth->fetchAll(FETCH_SQL);
    }
    
    /**
     * 
     * @param type $select
     * @param type $table
     * @param type $where
     * @return type
     */
    public function select_where($select, $table, array $where){
        $wk = '';
        $wv = '';
        foreach($where as $kw => $vw){
            $wk = $kw;
            $wv = $vw;
        }
        try {
            $sth = $this->connection->prepare("select $select from $table where $wk = ?");
            $sth->execute(array($wv));
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        return $sth->fetchAll(FETCH_SQL);
    }
    
    /**
     * 
     * @param type $table
     * @param type $where
     * @return type
     */
    public function where($table, array $where){
        $wk = '';
        $wv = '';
        foreach($where as $kw => $vw){
            $wk = $kw;
            $wv = $vw;
        }
        try {
            $sth = $this->connection->prepare("select * from $table where $wk = '$wv'");
            $sth->execute();            
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        return $sth->fetchAll(FETCH_SQL);
    }        
    
    /**
     * 
     * @param type $table
     * @return type
     */
    public function table($name){
        try {
            $sth = $this->connection->prepare("select * from $name");
            $sth->execute();            
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }        
        return $sth->fetchAll(FETCH_SQL);
    }
    
    /**
     * 
     * @param type $table
     * @param array $data
     */
    public function insert($table, array $data){
        ksort($data);        
        $fieldNames = implode(', ', array_keys($data));
        $fieldValues = ':'.implode(', :', array_keys($data));
        try {                   
            $sth = $this->connection->prepare("insert into $table($fieldNames) values($fieldValues)");       
            foreach($data as $key => $value){
                $sth->bindValue($key, $value);
            }        
            $sth->execute();
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
    }
        
    /**
     * 
     * @param type $table
     * @param array $data
     * @param array $where
     */
    public function update($table, array $data, array $where){
        ksort($data);
        /* */
        $fieldDetails = NULL;
        foreach($data as $key => $value){
            $fieldDetails.= "`$key`=:$key,";
        }        
        $fieldDetails = rtrim($fieldDetails, ',');                
        /* */
        $wk = '';
        $wv = '';
        foreach($where as $kw => $vw){
            $wk = $kw;
            $wv = $vw;
        }
        /* */
        try {
            $sth = $this->connection->prepare("UPDATE $table set $fieldDetails where $wk = '$wv'");
            foreach($data as $key => $value){
                $sth->bindValue(":$key", $value);
            }        
            $sth->execute();
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
    }
    
    /**
     * 
     * @param type $table
     * @param array $data
     * @param type $limit
     */
    public function delete($table, array $where, $limit = 1){
        try {
            foreach($where as $key => $value){
                $sth = $this->connection->prepare("delete from $table where :$key = $key limit $limit ");
                $sth->bindValue($key, $value);
                $sth->execute();
            }
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
    }
    
    /**
     * 
     * @param type $table
     * @return mixed
     */
    public function primary_key($table){
        try {
            $sth = $this->connection->prepare("SHOW INDEX FROM $table WHERE Key_name = 'PRIMARY'");
            $sth->execute();
            $key = $sth->fetch();
            $ret = "";
            if(isset($key[4])){
                $ret = $key[4];
            } else {
                $ret = "";
            }
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        return $ret;
    }
    
    /**
     * 
     * @param type $table
     * @return array
     */
    public function fields($table){
        try {
            $sth = $this->connection->prepare("select * from $table");
            $sth->execute();
            for($i=0;$i<$sth->columnCount();$i++){
                $col = $sth->getColumnMeta($i);
                $columns[] = $col['name'];
            }
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        return $columns;
    }
        
}