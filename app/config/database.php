<?php
/**
 * Para realizar la conexión a las bases de datos sql usamos la clase PDO.
 * To connect to sql databases we use PDO class.
 */

/**
 * Principal fetch style y base de datos seleccionada por defecto.
 * Main fetch style and selected database by default.
 */
define('FETCH_SQL', PDO::FETCH_CLASS);
define('DEFAULT_SQL', 'mysql');
define('ERR_MODE', true);

/**
 * Escoge un servidor de base de datos.
 * Choose a database server.
 */
define('MYSQL_DRIVER', 'mysql');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'restaurante-i');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'johan123');
define('MYSQL_PORT', 3306);

define('ORCL_DRIVER', 'oci');
define('ORCL_DATABASE', 'xe');
define('ORCL_HOST', 'localhost');
define('ORCL_PORT', 1521);
define('ORCL_USER', '');
define('ORCL_PASSWORD', '');

define('PGSQL_DRIVER', 'pgsql');
define('PGSQL_HOST', 'localhost');
define('PGSQL_DATABASE', '');
define('PGSQL_USER', '');
define('PGSQL_PASSWORD', '');
define('PGSQL_PORT', '');

define('SQLSRV_DRIVER', 'sqlsrv');
define('SQLSRV_SERVER', '');
define('SQLSRV_DATABASE', '');
define('SQLSRV_USER', '');
define('SQLSRV_PASSWORD', '');        

/**
 * MongoDB - Base de datos NoSQL
 * MongoDB - NoSQL Database
 */
define('MONGO_HOST', 'localhost');
define('MONGO_PORT', 27017);
define('MONGO_DATABASE', 'miblog');