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
 * @since 1.0.2
 * @version 1.0.2
 * 
 */

/**
 * Administra errores en la aplicación.<br><br>
 * Manage errors in the app.
 */
class ExecuteError extends ErrorManager {
    
    /**
     * Crea una instancia de la propia clase y ejecuta el método privado '_not_index'.<br><br>
     * Creates an instance of the own class and executes the private method '_not_index'.
     */
    public static function not_index(){
        $error_instance = new ExecuteError();
        $error_instance->_not_index();
    }
    
    /**
     * Error de método index en tu controlador.<br><br>
     * Method index error in your controller.
     */
    private function _not_index(){
        $title = 'Error insólito :D';
        $error = 'Aún no has creado el método index en tu controlador.';
        $this->render('error_x', compact('title', 'error'));
    }

    /**
     * Crea una instancia de la propia clase y ejecuta el método privado '_not_view'.<br><br>
     * Creates an instance of the own class and executes the private method '_not_view'.
     */
    public static function not_view($name){
        $error_instance = new ExecuteError();
        $error_instance->_not_view($name);
    }
    
    /**
     * Error de vista no encontrada en tu controlador.<br><br>
     * View not found error in your controller.
     */
    private function _not_view($name){
        $title = 'Error en la vista :D';
        $error = "La vista '$name' no existe.";
        $this->render('error_x', compact('title', 'error'));
    }
    
    /**
     * Crea una instancia de la propia clase y ejecuta el método privado '_other_error'.<br><br>
     * Creates an instance of the own class and executes the private method '_other_error'.
     */
    public static function other_error($title, $error){
        $error_instance = new ExecuteError();
        $error_instance->_other_error($title, $error);
    }
    
    /**
     * Algún tipo de error en la aplicación.<br><br>
     * Some error in the app.
     * @param type $title
     * @param type $error
     */
    private function _other_error($title, $error){
        $this->render('error_x', compact('title', 'error'));
    }
    
}