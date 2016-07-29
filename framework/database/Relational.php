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
 * Realiza la conexión a las bases de datos relacionales.<br><br>
 * Realizes the connection to relational databases
 */
class Relational extends PDO {    
    
    /**
     * Constructor que realiza la conexión.<br><br>
     * Constructor realizes the connection
     */
    public function __construct(){
        try {
            switch(DEFAULT_SQL){
                case 'mysql':
                    parent::__construct(MYSQL_DRIVER.':host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE.';port='.MYSQL_PORT, MYSQL_USER, MYSQL_PASSWORD);
                    break;
                case 'oci':
                    parent::__construct(ORCL_DRIVER.':dbname='.ORCL_DATABASE.';host='.ORCL_HOST, ORCL_USER, ORCL_PASSWORD);
                    break;
                case 'pgsql':
                    parent::__construct(PGSQL_DRIVER.':dbname='.PGSQL_DATABASE.';host='.PGSQL_HOST.';port='.PGSQL_PORT.';charset=utf8', PGSQL_USER, PGSQL_PASSWORD);
                    break;
                case 'pgsql':
                    parent::__construct(SQLSRV_DRIVER.':server=['.SQLSRV_SERVER.'];Database=['.SQLSRV_DATABASE.']', '['.SQLSRV_USER.']', '['.SQLSRV_PASSWORD.']');
                    break;
                default:
                    $error_db = 'app/errors/error_db.php';                    
                    require_once $error_db;
                    $error = new Error_DB();
                    $error->connection('El gestor de base de datos no se encuentra disponible', '', '');
                    break;
            }
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
    
    public function start(){
        return new Relational();
    }
    
    /**
     * 
     * @param type $sql
     * @param array $array
     * @return type
     */
    public function query($sql, array $array = array()){
        try {
            $sth = $this->prepare($sql);
            foreach($array as $key => $value){
                $sth->bindValue(":$key", $value);
            }
            $sth->execute();
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
        }
        return $sth->fetchAll(FETCH_SQL);
    }
    
    /**
     * 
     * @param type $sql
     * @param array $data
     * @return type
     */
    public function query_row_count($sql, array $data = array()){
        try {
            $sth = $this->prepare($sql);
            $sth->execute($data);
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
        }
        return $sth->rowCount();
    }
    
    /**
     * 
     * @param type $sql
     * @param array $data
     */
    public function statement($sql, array $data){
        try {
            $sth = $this->prepare($sql);
            $sth->execute($data);
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
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
            $sth = $this->prepare("select $fields from $table");
            $sth->execute();
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
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
    public function select_where($select, $table, $where){
        try {
            $wk = '';
            $wv = '';
            foreach($where as $kw => $vw){
                $wk = $kw;
                $wv = $vw;
            }
            $sth = $this->prepare("select $select from $table where $wk = '$wv'");
            $sth->execute();
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
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
        try {
            $wk = '';
            $wv = '';
            foreach($where as $kw => $vw){
                $wk = $kw;
                $wv = $vw;
            }
            $sth = $this->prepare("select * from $table where $wk = '$wv'");
            $sth->execute();
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
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
            $sth = $this->prepare("select * from $name");
            $sth->execute();            
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
        }
        return $sth->fetchAll(FETCH_SQL);
    }
    
    /**
     * 
     * @param type $table
     * @param array $data
     */
    public function insert($table, array $data){
        try {
            ksort($data);        
            $fieldNames = implode(', ', array_keys($data));
            $fieldValues = ':'.implode(', :', array_keys($data));        
            $sth = $this->prepare("insert into $table($fieldNames) values($fieldValues)");       
            foreach($data as $key => $value){
                $sth->bindValue($key, $value);
            }        
            $sth->execute();
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
        }
    }
        
    /**
     * 
     * @param type $table
     * @param array $data
     * @param array $where
     */
    public function update($table, array $data, array $where){
        try {
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
            $sth = $this->prepare("UPDATE $table set $fieldDetails where $wk = '$wv'");
            foreach($data as $key => $value){
                $sth->bindValue(":$key", $value);
            }        
            $sth->execute();
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
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
                $sth = $this->prepare("delete from $table where :$key = $key limit $limit ");
                $sth->bindValue($key, $value);
                $sth->execute();
            }
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
        }
    }
    
    /**
     * 
     * @param type $statement
     * @return type
     */
    public function old_query($statement){
        return parent::query($statement);
    }
    
    /**
     * 
     * @param type $table
     * @return mixed
     */
    public function primary_key($table){
        try {
            $sth = $this->prepare("SHOW INDEX FROM $table WHERE Key_name = 'PRIMARY'");
            $sth->execute();
            $key = $sth->fetch();
            $ret = "";
            if(isset($key[4])){
                $ret = $key[4];
            } else {
                $ret = "";
            }
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
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
            $sth = $this->prepare("select * from $table");
            $sth->execute();
            for($i=0;$i<$sth->columnCount();$i++){
                $col = $sth->getColumnMeta($i);
                $columns[] = $col['name'];
            }
        } catch(PDOException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
        }
        return $columns;
    }
        
}