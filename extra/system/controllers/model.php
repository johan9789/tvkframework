<?php
class Model extends ExtraController {    
    
    public function __construct(){
        $this->auth();
    }
    
    public function index(){
        Redirect::to('extra/start');
    }

    public function create_active_record(){
        Request::post('', true, 'extra/start/models');
        require 'system/config/config.php';
        require 'system/config/lang.php';
        
        $table_crud = Input::post('table_crud');
        $mayus_table_crud = ucfirst($table_crud);

        if($table_crud == 'undefined'){
            exit($xlang['selecciona_tabla']);
        }

        $model = new ModelX();
        $ya_existe_m = $xlang['modelo_ya_existe'];
        $model->active_record($table_crud, $mayus_table_crud, $ya_existe_m);

        echo $xlang['modelo_creado'];
    }

    public function create_relational_static(){
        Request::post('En construcción.', true, 'extra/start/models');
    }

    public function create_relational_inherited(){
        Request::post('En construcción.', true, 'extra/start/models');
    }

}