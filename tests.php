<?php
/** pruebas obteniendo url */
echo App::base().'<br>';

echo $_SERVER['SCRIPT_NAME'].'<br>';

$folder = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);  
echo $folder.'<br>';

$url_actual = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
echo "<b>$url_actual</b><br>";

function base_url(){
    $baseUrl = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://'; // checking if the https is enabled
    $baseUrl .= isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : getenv('HTTP_HOST'); // checking adding the host name to the website address
    return $baseUrl .= isset($_SERVER['SCRIPT_NAME']) ? dirname($_SERVER['SCRIPT_NAME']) : dirname(getenv('SCRIPT_NAME')); // adding the directory name to the created url and then returning it.
}
echo "base url is : ".base_url().'<br>';

function dameURL(){
    $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    return $url;
}
echo dameURL().'<br>';
/** **/

/** **/
echo App::assets();
/** **/