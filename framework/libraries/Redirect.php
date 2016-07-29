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
 * Esta clase fue creada para controlar redirecciones en la aplicación.<br><br>
 * This class was created to controll redirects in the app.
 */
class Redirect {
       
    /**
     * Redirige hacia una página específica en la applicación. Usa la url base.<br><br>
     * Redirects to specific page in the app. This uses the base url.
     * @param string $url URL.
     */
    public static function to($url = ''){
        // header('Location: '.base_url($url));
        header('Location: '.App::base($url));
        exit();
    }

    /**
     * Redirige hacia una página específica en la aplicación, situándose en la parte más alta de la página<br><br>
     * Redirects to a specific page in the application, reaching the top of the page.
     * @param string $url URL.
     */
    public static function top($url = ''){
        echo '<script type="text/javascript">';
        // echo 'top.location.href="'.base_url($url).'";';
        echo 'top.location.href="'.App::base($url).'";';
        echo '</script>';
        exit();
    }
    
    /**
     * Redirige hacia una página que no necesariamente esté en la aplicación.<br><br>
     * Redirects to a page that is not necessarily in the application.
     * @param string $url URL.
     */
    public static function other($url){
        header('Location: '.$url);
        exit();
    }
    
    /**
     * Redirige una o varias páginas atrás.<br><br>
     * Redirects one or several pages back.
     * @param int $pages Número de páginas web.<br>Number of web pages.
     */
    public static function back($pages = 1){
        echo '<script type="text/javascript">';
        echo "window.history.back($pages);";
        echo '</script>';
        exit();
    }
    
    /**
     * Redirige una o varias páginas hacia adelante.<br><br>
     * Redirects a page or pages forward.
     * @param int $pages Número de páginas web.<br>Number of web pages.
     */
    public static function go($pages = 1){
        echo '<script type="text/javascript">';
        echo "window.history.go($pages);";
        echo '</script>';
        exit();
    }
    
}