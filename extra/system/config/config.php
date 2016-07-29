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
 * Datos de configuración para el inicio de sesión.
 * Config data to login.
 */
$adm_auth['active'] = true;
$adm_auth['adm_auth_username'] = 'johan123';
$adm_auth['adm_auth_password'] = 'johan1';
$adm_auth['lang'] = (Session::has('xlangxlang')) ? Session::get('xlangxlang') : 'es';
$adm_auth['preview'] = true;