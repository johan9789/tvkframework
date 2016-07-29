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
 * @version 1.0
 * 
 */

/**
 * Clase principal que inicializa la aplicación.<br><br>
 * Main class that initializes the app.
 */
class Bootstrap {
    private $_url = null;
    private $_controller = null;
    private $_controller_path = CONTROLLERS_PATH;
    private $_model_path = MODELS_PATH;
    private $_error_file = ERROR_FILE;
    private $_default_file = DEFAULT_FILE;

    /**
     * Inicia la aplicacion.<br><br>
     * Starts the app.
     * @return boolean|nothing
     */
    public function start(){
        // Recibe la $_url | Gets the url
        $this->_get_url();                     
        // Carga el controlador principal | Loads the main controller
        /**
         * ejemplo: si visitas http://www.mipagina.com/ carga el controlador principal
         * example: if you visit http://www.mipage.com/ loads the main controller
         */
        if(empty($this->_url[0])){
            $this->_load_default_controller();            
            return false;
        }
        $this->_load_existing_controller();
        $this->_call_controller_method();
    }

    /**
     * Obtiene $_GET de 'url'.<br><br>
     * Fetches the $_GET from 'url'.
     */
    private function _get_url(){
        $url = isset($_GET['url_tvk_dsfdaojdiowndoiwednd']) ? $_GET['url_tvk_dsfdaojdiowndoiwednd'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }    

    /**
     * Se carga si no hay un parámetro GET pasado.<br><br>
     * This loads if there is no GET parameter passed.
     * @param type $param
     */
    private function _load_default_controller(){
        require $this->_controller_path.$this->_default_file;
        $def = explode('.', ucfirst($this->_default_file));
        $this->_controller = new $def[0];
        if(!method_exists($this->_controller, 'index')){
            $this->_method_index_not_exists();
        }
        $this->_controller->index();
    }
    
    /**
     * Carga un controlador existente si hay un parámetro GET pasado.<br><br>
     * Load an existing controller if there is a GET parameter passed.
     * @return boolean|string
     */
    private function _load_existing_controller(){
        $file = $this->_controller_path.$this->_url[0].'.php';
        if(file_exists($file)){
            require $file;
            $this->_controller = new $this->_url[0];
        } else {
            $this->_error();
            return false;
        }                
    }

    /**
     * Si un método es pasado en el parametro GET url.<br><br>
     * If a method is passed in the GET url parameter.<br><br>
     * http://www.yourdomain.com/controller/method/(param)/(param)/(param)<br>
     * url[0] = Controlador / Controller <br>
     * url[1] = Método / Method <br>
     * url[2] = Parámetro / Parameter <br>
     * url[3] = Parámetro / Parameter <br>
     * url[4] = Parámetro / Parameter... <br>
     * Y así... / And so...
     */
    private function _call_controller_method(){
        $length = count($this->_url);
        if($length > 1){
            // Se asegura de que el método que estamos llamando existe.
            // Make sure the method we're calling exists.
            if(!method_exists($this->_controller, $this->_url[1])){
                $this->_error();
            }
        }
        // Determina que cargar | Determite what to load
        // Acepta hasta 10 parámetros, si es que desearas más, sólo debes modificar cuidadosamente este código.
        // Accepts 10 parameters, if you wished more, just need to modify this code carefully.
        switch($length){
            case 12:
                // Controller->Method(Param1, Param2, Param3, Param4, Param5, Param6, Param 7, Param 8, Param 9, Param 10)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5], $this->_url[6], $this->_url[7], $this->_url[8], $this->_url[9], $this->_url[10], $this->_url[11]);
                break;
            case 11:
                // Controller->Method(Param1, Param2, Param3, Param4, Param5, Param6, Param 7, Param 8, Param 9)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5], $this->_url[6], $this->_url[7], $this->_url[8], $this->_url[9], $this->_url[10]);
                break;
            case 10:
                // Controller->Method(Param1, Param2, Param3, Param4, Param5, Param6, Param 7, Param 8)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5], $this->_url[6], $this->_url[7], $this->_url[8], $this->_url[9]);
                break;
            case 9:
                // Controller->Method(Param1, Param2, Param3, Param4, Param5, Param6, Param 7)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5], $this->_url[6], $this->_url[7], $this->_url[8]);
                break;
            case 8:
                // Controller->Method(Param1, Param2, Param3, Param4, Param5, Param6)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5], $this->_url[6], $this->_url[7]);
                break;
            case 7:
                // Controller->Method(Param1, Param2, Param3, Param4, Param5)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5], $this->_url[6]);
                break;
            case 6:
                // Controller->Method(Param1, Param2, Param3, Param4)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5]);
                break;
            case 5:
                // Controller->Method(Param1, Param2, Param3)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);                
                break;
            case 4:
                // Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 3:
                // Controller->Method(Param1)
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
                // Controller->Method
                $this->_controller->{$this->_url[1]}();
                break;            
            default:
                if(!method_exists($this->_controller, 'index')){
                    $this->_method_index_not_exists();
                }
                $this->_controller->index();
                break;
        }
    }
    
    /**
     * Muestra una página de error si no existe lo solicitado.<br><br>
     * Display an error page if nothing exists.
     * @return boolean
     */
    private function _error(){
        require 'app/errors/'.$this->_error_file;
        $errf = explode('.', ucfirst($this->_error_file));
        $error = new $errf[0];
        $error->index();
    }
    
    private function _method_index_not_exists(){
        require 'app/errors/'.$this->_error_file;
        $errf = explode('.', ucfirst($this->_error_file));
        $error = new $errf[0];
        $error->not_index();
    }
    
}