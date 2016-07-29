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
 * @version 1.0.1
 * 
 */

/**
 * El controlador padre de todos los controladores.<br><br>
 * The parent controller of all controllers.
 */
class MainController {
    
    /**
     * Carga el modelo seleccionado en el controlador.<br><br>
     * Loades the selected model in controller.
     * @param string $name Nombre del modelo a cargar.<br>Model name to load.
     * @param string $model_path Ruta del modelo, si se encuentra en una carpeta diferente.<br> Model path, if is allowed in other folder.
     */
    public function load($name, $model_path = 'app/models/'){
        $path = $model_path.$name.'.php';        
        if(file_exists($path)){
            require $model_path.$name.'.php';
        } else {
            require_once 'app/errors/error.php';
            $error = new Error();
            $error->other_error('Error :D', "La clase '$name' no existe.");
        }
    }

    /**
     *
     * @since 1.0.1
     */
    public function render($view, $data = array()){
        View::render($view, $data);
    }
    
    /**
     *
     * @since 1.0.1
     */
    public function template($view, $data = array()){
        View::template($view, $data);
    }

}