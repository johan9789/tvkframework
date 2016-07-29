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
 * Clase hecha para el manejo de archivos externos o internos en la aplicación.<br><br>
 * Class made ​​for handling external or internal files in the app.
 */
class File {
    
    /**
     * Abre un archivo y muestra su contenido.<br><br>
     * Opens a file and displays its contents.
     * @param string $file Ruta del archivo.<br>File Path.
     * @param boolean $nl2br Poner 'true' si se desea agregar saltos de línea extras.<br>Put 'true' if you want to add extra line breaks.
     * @return boolean Si el archivo no existe devuelve 'false'. Si sí existe devuelve el contenido del archivo.<br>If the file does not exist it returns false. If it exists returns the file contents.
     */
    public static function open($file, $nl2br = false){
        if(!file_exists($file)){
            return false;
        } else {
            $fx = fopen($file, 'r');
            $ready = '';
            while(!feof($fx)){
                $get = fgets($fx);
                if($nl2br){
                    $n = nl2br($get);
                    $ready.= $n;
                } else {
                    $ready.= $get;
                }
            }
            fclose($fx);
            return $ready;
        }
    }
    
    /**
     * Crea un nuevo archivo.<br><br>
     * Create a new file.
     * @param string $file Ruta del archivo.<br>File Path.
     * @param mixed $content Contenido que tendrá el archivo.<br>Content that the file will have.
     */
    public static function create($file, $content){
        $fx = fopen($file, 'a');
        fwrite($fx, $content);
        fclose($fx);
    }
        
    /**
     * Sobreescribe / edita un archivo.<br><br>
     * Overwrite / edit a file.
     * @param string $file Ruta del archivo.<br>File Path.
     * @param mixed $content Contenido del archivo que será sobreescrito / modificado.<br>File contents that will be overwritten / modified.
     * @return boolean Si el archivo no existe devuelve 'false'. Si sí existe devuelve el contenido del archivo.<br>If the file does not exist it returns false. If it exists returns 'true'.
     */
    public static function overwrite($file, $content){
        if(!file_exists($file)){
            return false;
        } else {
            $fx = fopen($file, 'w');
            fwrite($fx, $content);
            fclose($fx);
            return true;
        }
    }
    
}