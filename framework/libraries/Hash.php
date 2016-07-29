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
 * Manejo de hashes para la encriptación de palabras y contraseñas.<br><br>
 * Handling hashes to encrypt words and passwords.
 */
class Hash {
    
    /**
     * Encriptar datos, contraseñas y más.<br><br>
     * Encrypting data, password and more.
     * @param string $algo El algoritmo(md5, sha1, whirlpool, etc).<br>The algorithm(md5, sha1, whirlpool, etc).
     * @param string $data La palabra a encriptar.<br>The data to encode.
     * @param string $salt El 'salt'.<br>The salt(this should be the same throughout the system probably).
     * @return string La palabra/dato encriptado.<br>The hashed/salted data.
     */
    public static function create($algo, $data, $salt){
        $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        return hash_final($context);
    }
    
}