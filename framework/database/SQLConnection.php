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
 * @since 1.0.1
 * @version 1.0.1
 * 
 */

/**
 * 
 */
class SQLConnection {

    /**
     * 
     * @return \PDO
     */
    public function connection(){
        $connection = null;
        try {
            switch(DEFAULT_SQL){
                case 'mysql':
                    $connection = new PDO(MYSQL_DRIVER.':host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE.';port='.MYSQL_PORT, MYSQL_USER, MYSQL_PASSWORD);
                    break;
                case 'oci':
                    $connection = new PDO(ORCL_DRIVER.':dbname='.ORCL_DATABASE.';host='.ORCL_HOST, ORCL_USER, ORCL_PASSWORD);
                    break;
                case 'pgsql':
                    $connection = new PDO(PGSQL_DRIVER.':dbname='.PGSQL_DATABASE.';host='.PGSQL_HOST.';port='.PGSQL_PORT.';charset=utf8', PGSQL_USER, PGSQL_PASSWORD);
                    break;
                case 'pgsql':
                    $connection = new PDO(SQLSRV_DRIVER.':server=['.SQLSRV_SERVER.'];Database=['.SQLSRV_DATABASE.']', '['.SQLSRV_USER.']', '['.SQLSRV_PASSWORD.']');
                    break;
                default:
                    $error_db = 'app/errors/error_db.php';
                    if(file_exists($error_db)){
                        require_once $error_db;
                        $error = new Error_DB();
                        $error->connection('El gestor de base de datos no se encuentra disponible', '', '');
                    } else {
                        require_once realpath('../').'/'.$error_db;
                        $error = new Error_DB();
                        $error->connection('El gestor de base de datos no se encuentra disponible', '', '');
                    }
                    break;
            }
            $connection->exec('set names utf8');
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            $error_db = 'app/errors/error_db.php';
            if(file_exists($error_db)){
                require_once $error_db;
                $error = new Error_DB();
                $error->connection($e->getMessage(), $e->getFile(), $e->getTrace());
            } else {
                require_once realpath('../').'/'.$error_db;
                $error = new Error_DB();
                $error->connection($e->getMessage(), $e->getFile(), $e->getTrace());
            }
        }
        return $connection;
    }

    /**
     * 
     * @param PDOException $e
     */
    public function exception(PDOException $e){
        require_once 'app/errors/error_db.php';
        $error = new Error_DB();
        $error->query($e->getMessage(), $e->getFile(), $e->getTrace());
    }
    
}