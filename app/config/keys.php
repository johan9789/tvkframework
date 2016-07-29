<?php
/**
 * HashKeys:
 * Definir una vez y usarlo en la aplicación, no modificar luego.
 * Define one time and use it in the app, don't modify after.
 */
// Es para otros hash_keys. | This is for other hash_keys.
define('HASH_GENERAL_KEY', '');
// Es sólo para las contraseñas en la base de datos. | This is for database passwords only.
define('HASH_PASSWORD_KEY', '');

/** Session key */
// Es opcional, pero si lo vas a usar preferentemente escribe un '_' al final. | It's optionl, but if you'll use it, write '_' after all.
define('SESSION_KEY', 'tvk_');