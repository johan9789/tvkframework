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
 * Realiza consultas a las bases de datos relacionales.<br><br>
 * Realizes queries to relational databases.
 */
class Relational {
    /**
     * PDO
     * @var mixed new PDO(...);
     */
    private $pdo;
    /**
     * Conexión | Connection.
     * @var mixed new PDO(...)->connection('ejemplo | example');
     */
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
     * @param string $sql La consulta.<br>The query.
     * @param array $data Datos a limpiar.<br>Data to clean.
     * @return array Datos devueltos.<br>Returned data.
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
     * @param string $sql La consulta.<br>The query.
     * @param array $data Datos a limpiar.<br>Data to clean.
     * @return int Cantidad de resultados.<br>Number of results.
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
     * Ejecuta una consulta que no devuelve datos.<br><br>
     * Executes a query that returns no data.
     * @param string $sql La consulta.<br>The query.
     * @param array $data Datos a limpiar.<br>Data to clean.
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
     * Ejecuta una consulta indicando el nombre de la tabla y los campos. Luego devuelve los resultados.<br><br>
     * Executes a query indicating the name of the table and the fields. Then returns the results.
     * @param string $select Los campos, ej: (nombre, apellidos, ...)<br>The fields, ex: (name, last_name, ...)
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @return array Datos devueltos.<br>Returned data.
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
     * Ejecuta una consulta indicando el nombre de la tabla, los campos y la condición 'where'. Luego devuelve los resultados.<br><br>
     * Executes a query indicating the name of the table, the fields and the condition 'where'. Then returns the results.
     * @param string $select Los campos, ej: (nombre, apellidos, ...)<br>The fields, ex: (name, last_name, ...)
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @param array $where Condición 'where'.<br>Condition 'where'.
     * @return array Datos devueltos.<br>Returned data.
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
     * Ejecuta una consulta indicando el nombre de la tabla y la condición 'where'. Luego devuelve los resultados.<br><br>
     * Executes a query indicating the name of the table and the condition 'where'. Then returns the results.
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @param array $where Condición 'where'.<br>Condition 'where'.
     * @return array Datos devueltos.<br>Returned data.
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
     * Devuelve todos los datos de una tabla.<br><br>
     * Returns all data from a table.
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @return array Datos devueltos.<br>Returned data.
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
     * Inserta datos en una tabla.<br><br>
     * Insert data into a table.
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @param array $data Datos a insertar.<br>Data to insert.
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
     * Actualiza datos de una tabla.<br><br>
     * Update data in a table.
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @param array $data Datos a actualizar.<br>Data to update.
     * @param array $where Condición 'where'.<br>Condition 'where'.
     */
    public function update($table, array $data, array $where){
        ksort($data);
        /** 1°... */
        $field_details = null;
        foreach($data as $key => $value){
            $field_details.= "`$key`=:$key,";
        }        
        $fields = rtrim($field_details, ',');                
        /** 2°... */
        $wk = '';
        $wv = '';
        foreach($where as $kw => $vw){
            $wk = $kw;
            $wv = $vw;
        }
        /** 3°... */
        try {
            $sth = $this->connection->prepare("UPDATE $table set $fields where $wk = '$wv'");
            foreach($data as $key => $value){
                $sth->bindValue(":$key", $value);
            }        
            $sth->execute();
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
    }
    
    /**
     * Elimina registros de una tabla.<br><br>
     * Removes rows from a table.
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @param array $where Condición 'where'.<br>Condition 'where'.
     * @param int $limit LIMIT
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
     * Devuelve el nombre de la clave primaria de una tabla.<br><br>
     * Returns the name of the primary key of a table.
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @return string El nombre de la clave primaria.<br>The primary key's name.
     */
    public function primary_key($table){
        try {
            $sth = $this->connection->prepare("SHOW INDEX FROM $table WHERE Key_name = 'PRIMARY'");
            $sth->execute();
            $key = $sth->fetch();
            $ret = (isset($key[4])) ? $key[4] : '';
        } catch(PDOException $e){
            $this->pdo->exception($e);
        }
        return $ret;
    }
    
    /**
     * Devuelve los campos de una tabla.<br><br>
     * Returns the fields in a table.
     * @param string $table El nombre de la tabla.<br>The name of the table.
     * @return array Datos devueltos.<br>Returned data.
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