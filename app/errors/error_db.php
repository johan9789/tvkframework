<?php
/**
 * Administra los errores relacionados a las bases de datos.<br><br>
 * Manage errors related to databases.
 */
class Error_DB extends ErrorManager {
    private $err_mode = true;
    
    /**
     * Error de conexión a una base de datos SQL.<br><br>
     * Error connecting to a SQL database.
     * @param string $message Mensaje a mostrar.<br>Message to display.
     * @param string $location Ubicación principal del error.<br>Primary location of the error.
     * @param string $details Detalles del error.<br>Error details
     */
    public function connection($message, $location, $details){
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
    public function query($message, $location, $details){
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
    public function no_sql($message, $location, $details){
        if($this->err_mode){
            $title = 'Error de MongoDB';
            $exception = 'MongoException';
            $this->render('error_db', compact('title', 'message', 'location', 'details', 'exception'));
        }
    }
    
}