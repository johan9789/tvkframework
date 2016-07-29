<?php
/** Capturando errores fatales (beta) */
register_shutdown_function("fatal_handler");
function fatal_handler(){
    $error = error_get_last();
    if($error !== NULL){
        $exception = 'FatalErrorException';
        $numero = $error["type"].' ';
        $archivo = $error["file"].' ';
        $linea = $error["line"].' ';
        $error = $error["message"].' ';
        require_once 'framework/pages/general_error.php';
        exit();
    }    
}

/** Capturando errores (beta) */
error_reporting(E_ALL);
function showErrors($numero, $error, $archivo, $linea){
    header(null);
    $exception = 'PHPException';
    require_once 'framework/pages/general_error.php';
    exit();
}
set_error_handler('showErrors');