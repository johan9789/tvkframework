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
class MongoConnection {

    /**
     * 
     * @return \MongoClient
     */
    public function connection(){
        $connection = null;
        try {
            $string = sprintf('mongodb://%s:%d', MONGO_HOST, MONGO_PORT);
            $connection = new MongoClient($string);
        } catch(MongoConnectionException $e){
            require_once 'app/errors/error_db.php';
            $error = new Error_DB();
            $error->no_sql(utf8_encode($e->getMessage()), $e->getFile(), $e->getTrace());
        }
        return $connection;
    }
    
    /**
     * 
     * @param MongoException $e
     */
    public function exception(MongoException $e){
        
    }

}