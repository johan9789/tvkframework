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

require_once '../config.php';
require_once '../../app/config/paths.php';
require_once '../../app/config/other.php';
spl_autoload_register(function($class){
    if(file_exists("../../".SYSTEM."libraries/$class.php")){
        require_once "../../".SYSTEM."libraries/$class.php";
    }
});

$compare['xtra_us_ad'] = $adm_auth['adm_auth_username'];
$compare['xtra_pwd_ad'] = $adm_auth['adm_auth_password'];

if(Input::compare($compare)){
    $xadmin = Input::post('xtra_us_ad');
    Session::start();
    Session::set('xxtra_adm_us', $xadmin);
    Redirect::other('home.php');
} else {
    Redirect::other('../index.php');
}