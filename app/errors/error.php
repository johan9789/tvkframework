<?php
/**
 * Administra errores en la aplicación.<br><br>
 * Manage errors in the app.
 */
class Error extends ErrorManager {
    
    /**
     * Puedes personalizar tu página de 'Error 404' aquí.<br><br>
     * You can personalize your 'Error 404' page here.
     */
    public function index(){
        $title = 'Error 404';
        $error = 'La página solicitada no se encuentra disponible.';
    	View::render('layouts/header', compact('title'));
        View::render('error', compact('title', 'error'));
        View::render('layouts/footer');
        exit();
    }
    
    /**
     * Error de método index en tu controlador.<br><br>
     * Method index error in your controller.
     */
    public function not_index(){
        $title = 'Error insólito :D';
        $error = 'Aún no has creado el método index en tu controlador.';
        $this->render('error_x', compact('title', 'error'));
    }

    /**
     * Error de vista no encontrada en tu controlador.<br><br>
     * View not found error in your controller.
     */
    public function not_view($name){
        $title = 'Error en la vista :D';
        $error = "La vista '$name' no existe.";
        $this->render('error_x', compact('title', 'error'));
    }
    
    /**
     * Algún tipo de error en la aplicación.<br><br>
     * Some error in the app.
     * @param type $title
     * @param type $error
     */
    public function other_error($title, $error){
        $this->render('error_x', compact('title', 'error'));
    }

    public function general_error(){}
    
}