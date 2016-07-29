<?php
class Crud extends ExtraController {

    public function __construct(){
        $this->auth();
    }
    
    public function create_active_record(){
        App::not_post('Error', true, 'extra/start/crud');
        require 'system/config/config.php';
        require 'system/config/lang.php';
        
        $rec_crud = Input::all();
        $name_crud = $rec_crud['name_crud'];
        $table_crud = $rec_crud['table_crud'];
        $mayus_name_crud = ucfirst($name_crud);
        $mayus_table_crud = ucfirst($table_crud);

        if($table_crud == 'undefined'){
            exit($xlang['selecciona_tabla']);
        }

        if($name_crud == $table_crud){
            exit($xlang['crud_igual_tabla']);
        }

        $pk_table = Relational::start()->primary_key($table_crud);
        $fields_table = Relational::start()->fields($table_crud);

        $model = new ModelX();
        $ya_existe_m = $xlang['modelo_ya_existe'];
        $model->active_record($table_crud, $mayus_table_crud, $ya_existe_m);

        $controller = new ControllerX();
        $ya_existe_crud = $xlang['crud_ya_existe'];
        $controller->active_record($name_crud, $mayus_name_crud, $table_crud, $mayus_table_crud, $pk_table, $fields_table, $ya_existe_crud);

        $view = new ViewX();
        $view->gen_metro_bootstrap();
        $view->index_active_record($name_crud, $table_crud, $mayus_table_crud, $fields_table, $pk_table);
        $view->edit_active_record($name_crud, $table_crud, $mayus_table_crud, $fields_table, $pk_table);

        echo $xlang['crud_creado'];
    }

}