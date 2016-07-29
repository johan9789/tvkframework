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
 * 
 */
class File {
    
    /**
     * 
     * @param type $file
     * @return boolean
     */
    public static function open($file, $nl2br = false){
        if(!file_exists($file)){
            return false;
        }
        $fx = fopen($file, 'r');
        $ready = '';
        while(!feof($fx)){
            $get = fgets($fx);
            if($nl2br){
                $n = nl2br($get);
                $ready.= $n;
            } elseif(!$nl2br){
                $ready.= $get;
            }
        }
        fclose($fx);
        return $ready;
    }
    
    /**
     * 
     * @param type $file
     * @param type $content
     * @return boolean
     */
    public static function create($file, $content){
        $fx = fopen($file, 'a');
        fwrite($fx, $content);
        fclose($fx);
    }
        
    /**
     * 
     * @param type $file
     * @param type $content
     * @return boolean
     */
    public static function overwrite($file, $content){
        if(!file_exists($file)){
            return false;
        }
        $fx = fopen($file, 'w');
        fwrite($fx, $content);
        fclose($fx);
        return true;
    }
    
}