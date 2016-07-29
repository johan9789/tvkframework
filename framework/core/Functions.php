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
 * Funciones útiles para la aplicación.
 * Util functions to app.
 */

/**
 * Devuelve la url base de la aplicación, ej: http://www.mipagina.com/ <b>¡No eliminar ni modificar!</b><br><br>
 * Returns the base url of webapp, ex: http://www.mipage.com/ <b>Not delete or modify!</b>
 * @param string $url Agregar controlador, métodos y parámetros a la url, ej: http://www.mipagina.com/controlador/metodo/params <br>Add controller, methods and params to url, ex: http://www.mipage.com/controller/method/params
 * @return string URL.
 */
function base_url($url = ''){
    return URL.$url;
}

/**
 * Devuelve la url base de los assets(css, js, img). <b>¡No eliminar ni modificar!</b><br><br>
 * Returns the base url of assets(css, js, img). <b>Not delete or modify!</b>
 * @param string $asset Tu css, js, img... a cargar.<br>Your css, js, img... to load.
 * @return string URL de assets.<br>Assets URL.
 */
function assets_url($asset = ''){
    return URL.ASSETS.$asset;
}

/**
 * Compara si 2 variables son iguales.<br><br>
 * Compares if 2 var are equals.
 * @param mixed $var Primera variable a comparar.<br>First var to compare.
 * @param mixed $other Segunda variable a comparar.<br>Second var to compare.
 * @return boolean Devuelve <b>true</b> si ambas son iguales o <b>false</b> si son diferentes.<br>Returns <b>true</b> if both are equals or <b>false</b> if are different.
 */
function equals($var, $other){
    return($var == $other);
}

/**
 * Reemplaza carácteres especiales en una palabra.<br><br>
 * Replaces special characters in a word.
 * @param string $word Palabra a evaluar.<br>Word to evaluate.
 */
function replace_special_chars($word){
    $find = ['á', 'é', 'í', 'ó', 'ú', 'ñ'];
    $repl = ['a', 'e', 'i', 'o', 'u', 'n'];
    $final_word = str_replace($find, $repl, $word);
    return $final_word;
}

/**
 * Pues, escribe...<br><br>
 * So, write...
 * @param mixed $something Solamente escribe algo...<br>Only write something...
 */
function write($something){
    echo $something;
}