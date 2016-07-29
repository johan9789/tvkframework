<?php
/**
 * Administra los errores relacionados a las bases de datos.<br><br>
 * Manage errors related to databases.
 * 
 * Recomendación: comenta el cuerpo de todos los métodos cuando subas la aplicación a internet
 * ya que si ocurre un error inesperado, este no se mostrará.
 * 
 * Recommendation: comments on the body of all the methods when you upload the application to 
 * the internet already that if an unexpected error occurs, it will not be displayed.
 * 
 */
class Error_DB extends ErrorManager {
    private $err_mode = true;
    
    /**
     * Error de conexión a una base de datos SQL.<br><br>
     * Error connecting to a SQL database.
     * @param mixed $message Mensaje a mostrar.<br>Message to display.
     * @param mixed $location Ubicación principal del error.<br>Primary location of the error.
     * @param mixed $details Detalles del error.<br>Error details
     */
    public function connection($message, $location, $details){
        if($this->err_mode){
            $title = 'Error de conexión';
            $exception = 'PDO Exception';
            $this->render('error_db', compact('title', 'message', 'location', 'details', 'exception'));
            exit();
        } else {
            exit();
        }
    }
    
    /**
     * Error en una consulta SQL.<br><br>
     * Error in a SQL query.
     * @param mixed $message Mensaje a mostrar.<br>Message to display.
     * @param mixed $location Ubicación principal del error.<br>Primary location of the error.
     * @param mixed $details Detalles del error.<br>Error details
     */
    public function query($message, $location, $details){
        if($this->err_mode){
            $title = 'Error de consulta SQL';
            $exception = 'PDOException';
            $this->render('error_db', compact('title', 'message', 'location', 'details', 'exception'));
            exit();
        } else {
            exit();
        }
    }
    
    /**
     * Error general en una base de datos NoSQL.<br><br>
     * General error in NoSQL database.
     * @param mixed $message Mensaje a mostrar.<br>Message to display.
     * @param mixed $location Ubicación principal del error.<br>Primary location of the error.
     * @param mixed $details Detalles del error.<br>Error details
     */
    public function no_sql($message, $location, $details){
        if($this->err_mode){
            $title = 'Error de MongoDB';
            $exception = 'MongoException';
            $this->render('error_db', compact('title', 'message', 'location', 'details', 'exception'));
            exit();
        } else {
            exit();
        }
    }
    
}