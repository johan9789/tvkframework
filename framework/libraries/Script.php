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
 * 
 */
class Script {

	public static function bit_ly($url){
		$content = file_get_contents("http://api.bit.ly/v3/shorten?login=TUUSER&apiKey=TUAPIKEY&longUrl=".$url."&format=xml"); 
    	$element = new SimpleXmlElement($content); 
    	$bitly = $element->data->url; 
    	if($bitly){ 
	        return $bitly; 
    	} else { 
        	return '0'; 
    	}
	}

}