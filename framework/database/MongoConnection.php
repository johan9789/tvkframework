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
 * @version 1.0.2
 * 
 */

/**
 * Realiza la conexión a la base de datos MongoDB.<br><br>
 * Realizes the connection to MongoDB database.
 */
class MongoConnection {

    /**
     * Realiza la conexión.<br><br>
     * Realizes the connection.
     * @return \MongoClient
     */
    public function connection(){
        $connection = null;
        try {
            $string = sprintf('mongodb://%s:%d', MONGO_HOST, MONGO_PORT);
            $connection = new MongoClient($string);
        } catch(MongoConnectionException $e){                        
            ErrorDB::no_sql($e->getMessage(), $e->getFile(), $e->getTrace());
        }
        return $connection;
    }
    
    /**
     * Controla las excepciones que puedan suceder mientras se realiza la conexión.<br><br>
     * Controlles the exceptions that can happens while it realizes the connection.
     * @param MongoException $e
     */
    public function exception(MongoException $e){}

}