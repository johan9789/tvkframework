<?php
/**
 * Declara filtros para los controladores.<br><br>
 * Declares filters to controllers.
 * @since 1.0.2
 */
class Filter {
    
    /**
     * Filtro de ejemplo, no es real. Si tú quieres házlo real.<br><br>
     *  Filter example, is not real. If you want real do it.
     */
    public static function example(){
        /**
         * ¿Cómo usarlo? En tu controlador declara un constructor y luego coloca el filtro ahí.
         * How do I use it? In your controller you declare a constructor and then place the filter there.
         * Ej: | Ex:
         * class Example extends MainController {
         * 
         *     public function __construct(){
         *         Filter::example();
         *     }
         * 
         * }
         * Y así el filtro será lo primero que se ejecute en tu controlador.
         * And so the filter is the first thing that runs on your controller.
         */
        if(!Session::has('example')){
            Redirect::to();
        }
    }
    
}