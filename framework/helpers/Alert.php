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
 * Creado para agilizar el manejo de alertas de JavaScript, redirecciones y más.<br><br>
 * Created to streamline the management of JavaScript alerts, redirects and more.
 */
class Alert {
	
    /**
     * Alerta simple de JavaScript que solo muestra un mensaje.<br><br>
     * Alert Simple JavaScript that only displays a message.
     * @param string $alert Mensaje.<br>Message.
     */
    public static function single($alert){
        echo '<script type="text/javascript">';
        echo "alert('$alert');";
        echo '</script>';
    }
	
    /**
     * Muestra un mensaje y luego redirecciona a la página indicada.<br><br>
     * Displays a message and redirects to indicated web page.
     * @param string $alert Mensaje.<br>Message.
     * @param string $redirect URL a redireccionar.<br>URL to redirect.
     */
    public static function redirect($alert, $redirect){
        echo '<script type="text/javascript">';
        echo "alert('$alert');";
        echo 'window.location.href="'.URL.$redirect.';"';
        echo '</script>';
        exit();
    }
    
    /**
     * Muestra un mensaje, se sitúa en la parte más alta de la página actual y luego redirecciona a la página indicada.<br><br>
     * Displays a message, stood at the top of the current web page and then redirects to the specified web page.
     * @param string $alert Mensaje.<br>Message.
     * @param string $redirect URL a redireccionar.<br>URL to redirect.
     */
    public static function redirect_top($alert, $redirect){
        echo '<script type="text/javascript">';
        echo "alert('$alert');";
        echo 'top.location.href="'.URL.$redirect.'";';
        echo '</script>';
        exit();
    }
    
    /**
     * Muestra un mensaje, y luego redirecciona hacia atrás. Debes indicar cuantas 
     * páginas atrás redireccionará. Por defecto redirecciona 1.<br><br>
     * Displays a message and redirects back. You must indicate how many pages 
     * back redirect. Redirects default 1.
     * @param string $alert Mensaje.<br>Message.
     * @param int $pages Número de páginas web.<br>Number of web pages.
     */
    public static function redirect_back($alert, $pages = 1){
        echo '<script type="text/javascript">';
        echo "alert('$alert');";
        echo "window.history.back($pages);";
        echo '</script>';
        exit();
    }
    
    /**
     * Muestra un mensaje y luego redirecciona a la página indicada (página externa).<br><br>
     * Displays a message and redirects to indicated web page (external page).
     * @param string $alert Mensaje.<br>Message.
     * @param string $redirect URL externa a redireccionar.<br>External URL to redirect.
     */
    public static function other_redirect($alert, $redirect){
        echo '<script type="text/javascript">';
        echo "alert('$alert');";
        echo 'window.location.href="'.$redirect.'";';
        echo '</script>';
        exit();
    }
    
}