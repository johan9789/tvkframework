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
 * @since 1.0.2 (en esta carpeta | in this folder)
 * @version 1.0.2
 * 
 */

/**
 * Administra los errores relacionados a las bases de datos.<br><br>
 * Manage errors related to databases.
 */
class ErrorDB extends ErrorManager {
    private $err_mode = ERR_MODE;
    
    /**
     * Error de conexión a una base de datos SQL.<br><br>
     * Error connecting to a SQL database.
     * @param string $message Mensaje a mostrar.<br>Message to display.
     * @param string $location Ubicación principal del error.<br>Primary location of the error.
     * @param string $details Detalles del error.<br>Error details
     */
    public static function connection($message, $location, $details){
        $error_db = new ErrorDB();
        $error_db->_connection($message, $location, $details);
    }
    
    /**
     * Error de conexión a una base de datos SQL.<br><br>
     * Error connecting to a SQL database.
     * @param string $message Mensaje a mostrar.<br>Message to display.
     * @param string $location Ubicación principal del error.<br>Primary location of the error.
     * @param string $details Detalles del error.<br>Error details
     */
    private function _connection($message, $location, $details){
        if($this->err_mode){
            $title = 'Error de conexión';
            $exception = 'PDOException';
            $this->render('error_db', compact('title', 'message', 'location', 'details', 'exception'));
        }
    }
    
    /**
     * Error en una consulta SQL.<br><br>
     * Error in a SQL query.
     * @param string $message Mensaje a mostrar.<br>Message to display.
     * @param string $location Ubicación principal del error.<br>Primary location of the error.
     * @param string $details Detalles del error.<br>Error details
     */
    public static function query($message, $location, $details){
        $error_db = new ErrorDB();
        $error_db->_query($message, $location, $details);
    }
    
    /**
     * Error en una consulta SQL.<br><br>
     * Error in a SQL query.
     * @param string $message Mensaje a mostrar.<br>Message to display.
     * @param string $location Ubicación principal del error.<br>Primary location of the error.
     * @param string $details Detalles del error.<br>Error details
     */
    private function _query($message, $location, $details){
        if($this->err_mode){
            $title = 'Error de consulta SQL';
            $exception = 'PDOException';
            $this->render('error_db', compact('title', 'message', 'location', 'details', 'exception'));
        }
    }
    
    /**
     * Error general en una base de datos NoSQL.<br><br>
     * General error in NoSQL database.
     * @param string $message Mensaje a mostrar.<br>Message to display.
     * @param string $location Ubicación principal del error.<br>Primary location of the error.
     * @param string $details Detalles del error.<br>Error details
     */
    public static function no_sql($message, $location, $details){
        $error_db = new ErrorDB();
        $error_db->_no_sql($message, $location, $details);
    }
    
    /**
     * Error general en una base de datos NoSQL.<br><br>
     * General error in NoSQL database.
     * @param string $message Mensaje a mostrar.<br>Message to display.
     * @param string $location Ubicación principal del error.<br>Primary location of the error.
     * @param string $details Detalles del error.<br>Error details
     */
    private function _no_sql($message, $location, $details){
        if($this->err_mode){
            $title = 'Error de MongoDB';
            $exception = 'MongoException';
            $this->render('error_db', compact('title', 'message', 'location', 'details', 'exception'));
        }
    }
    
}