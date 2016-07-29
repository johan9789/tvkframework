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
 * Administra errores en la aplicación.<br><br>
 * Manage errors in the app.
 */
class MyErrors extends ErrorManager {
    
    /**
     * Puedes personalizar tu página de 'Error 404' aquí.<br><br>
     * You can personalize your 'Error 404' page here.
     */
    public function index(){
        $title = 'Error 404';
        $error = 'La página solicitada no se encuentra disponible.';
        $this->template('error', compact('title', 'error'));
    }
    
}