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
$xlang = array();
$xlang['welcome'] = ($adm_auth['lang'] == 'es') ? 'Bienvenido a la sección extra del framework, '
        .'en el menú puedes ver que hay generadores de crud, controladores y más :) Úsalo según creas '
        .'conveniente y necesario.' : 'Welcome to extra section from framework, in the menu you can see there are crud '
        .'generator, controllers generator and more :) Use it if you considere necesary.';
$xlang['version'] = 'TvK Framework 1.0';
$xlang['created_by'] = ($adm_auth['lang'] == 'es') ? 'Creado por' : 'Created by';
$xlang['iniciar_sesion'] = ($adm_auth['lang'] == 'es') ? 'Iniciar sesión' : 'Login';
$xlang['usuario'] = ($adm_auth['lang'] == 'es') ? 'Usuario' : 'Username';
$xlang['contrasena'] = ($adm_auth['lang'] == 'es') ? 'Contraseña' : 'Password';
$xlang['seccion_extra'] = ($adm_auth['lang'] == 'es') ? 'Sección extra' : 'Extra section';
$xlang['titulo_principal'] = $xlang['seccion_extra'].' - TvK Framework 1.0';
$xlang['ingresar'] = ($adm_auth['lang'] == 'es') ? 'Ingresar' : 'Sign in';

$xlang['inicio'] = ($adm_auth['lang'] == 'es') ? 'Inicio' : 'Home';
$xlang['controladores'] = ($adm_auth['lang'] == 'es') ? 'Controladores' : 'Controllers';
$xlang['modelos'] = ($adm_auth['lang'] == 'es') ? 'Modelos' : 'Models';
$xlang['formularios'] = ($adm_auth['lang'] == 'es') ? 'Formularios' : 'Forms';
$xlang['cerrar_sesion'] = ($adm_auth['lang'] == 'es') ? 'Cerrar sesión' : 'Logout';

$xlang['nombre'] = ($adm_auth['lang'] == 'es') ? 'Nombre' : 'Name';
$xlang['seleccionar'] = ($adm_auth['lang'] == 'es') ? 'Seleccionar' : 'Select';

/** CRUD */
$xlang['nombre_crud'] = ($adm_auth['lang'] == 'es') ? 'Nombre del C.R.U.D' : 'C.R.U.D. Name';
$xlang['crear_crud'] = ($adm_auth['lang'] == 'es') ? 'Crear C.R.U.D' : 'Create C.R.U.D.';
$xlang['escribe_nombre'] = ($adm_auth['lang'] == 'es') ? 'Escribe un nombre' : 'Write a name';
$xlang['crud_act_rec'] = ($adm_auth['lang'] == 'es') ? 'CRUD con Active Record' : 'CRUD with Active Record';
$xlang['crud_rel'] = ($adm_auth['lang'] == 'es') ? "CRUD con clase 'Relational'" : "CRUD with 'Relational' class";
$xlang['selecciona_tabla'] = ($adm_auth['lang'] == 'es') ? 'Selecciona una tabla de la base de datos.' : 'Select a table from the database.';
$xlang['crud_igual_tabla'] = ($adm_auth['lang'] == 'es') ? 'El C.R.U.D no debe llamarse igual a la tabla.' : 'The C.R.U.D. must not have the same table name.';
$xlang['crud_ya_existe'] = ($adm_auth['lang'] == 'es') ? 'El C.R.U.D./Controlador ya existe.' : 'The C.R.U.D./Controller already exists.';
$xlang['crud_creado'] = ($adm_auth['lang'] == 'es') ? 'El C.R.U.D fue creado correctamente.' : 'The C.R.U.D. was created successfully.';

/** Modelos / Models */
$xlang['model_act_rec'] = ($adm_auth['lang'] == 'es') ? 'Modelo con Active Record' : 'Model with Active Record';
$xlang['model_rel'] = ($adm_auth['lang'] == 'es') ? "Modelo con clase 'Relational'" : "Model with 'Relational' class";
$xlang['model_msj_click'] = ($adm_auth['lang'] == 'es') ? '¿Estás seguro de crear el modelo?' : 'Are you sure to create the model?';
$xlang['modelo_creado'] = ($adm_auth['lang'] == 'es') ? 'El Modelo fue creado correctamente.' : 'The Model was created successfully.';
$xlang['modelo_ya_existe'] = ($adm_auth['lang'] == 'es') ? 'El Modelo ya existe.' : 'The Model already exists.';

/** Formularios / Forms */
$xlang['gen_form'] = ($adm_auth['lang'] == 'es') ? 'Generar formulario' : 'Generate form';
$xlang['name_form'] = ($adm_auth['lang'] == 'es') ? 'Nombre del formulario' : 'Name form';
$xlang['gen_t'] = ($adm_auth['lang'] == 'es') ? 'Generar' : 'Generate';
$xlang['fm_name'] = ($adm_auth['lang'] == 'es') ? 'Nombre' : 'Name';
$xlang['fm_type'] = ($adm_auth['lang'] == 'es') ? 'Tipo' : 'Type';
$xlang['f_add'] = ($adm_auth['lang'] == 'es') ? 'Agregar' : 'Add';
$xlang['type_form'] = ($adm_auth['lang'] == 'es') ? 
    ['Formulario HTML5', 'Formulario clásico', 'Formulario TvK HTML5', 'Formulario TvK'] : 
    ['HTML5 form', 'Classic form', 'HTML5 TvK Form', 'TvK Form'];
$xlang['optional'] = ($adm_auth['lang'] == 'es') ? '(opcional) separar con comas (, )' : '(optional) separate with commas (, )';