<?php
class ControllerX {
    
    public function active_record($name_crud, $mayus_name_crud, $table_crud, $mayus_table_crud, $pk_table, $fields_table, $ya_existe_crud){
        // Revisamos si el controlador ya existe.
        if(file_exists("../../app/controllers/$name_crud.php")){
            exit($ya_existe_crud);
        }
        // Seguimos...
        $fc = fopen("../../app/controllers/$name_crud.php", 'a');
        $con = '<?php';
        $con.= "\n";
        $con.= "class $mayus_name_crud extends MainController {";
        $con.= "\n";
        $con.= "\n";
        $con.= "    public function __construct(){"."\n";
        $con.= "        ".'$this->load('."'$table_crud'".');'."\n";
        $con.= "    }";
        $con.= "\n";
        $con.= "\n";
        $con.= "    public function index(){\n";
        $con.= '        $'."$table_crud"." = new $mayus_table_crud();"."\n";
        $con.= '        $data_'."$table_crud".' = $'."$table_crud".'->all();'."\n";
        /** Si existen los layouts 'header' y 'footer'... */
        if(file_exists('../../app/views/layouts/header.php') && file_exists('../../app/views/layouts/footer.php')){
            $con.= "        View::template('$name_crud/index', compact('data_$table_crud'));"."\n";
        } else {
            $con.= "        View::render('$name_crud/index', compact('data_$table_crud'));"."\n";
        }           
        /** */     
        $con.= "    }";
        $con.= "\n";
        $con.= "\n";
        $con.= "    public function edit(".'$id = null'."){"."\n";
        if($pk_table != ""){
            $con.= '        if($id == null){'."\n";
            $con.= "            Redirect::to('$name_crud');"."\n";
            $con.= '        }'."\n";
            $con.= '        $'."$table_crud"." = new $mayus_table_crud();"."\n";
            $con.= '        $data_'."$table_crud".' = $'."$table_crud".'->all();'."\n";
            $con.= '        $data_'."$table_crud".'_edit = $'."$table_crud".'->findOne($id);'."\n";
            $con.= '        if(count($data_'."$table_crud".'_edit) == 0){'."\n";
            $con.= "            Redirect::to('$name_crud');"."\n";
            $con.= '        }'."\n";
            /** Si existen los layouts 'header' y 'footer'... */
            if(file_exists('../../app/views/layouts/header.php') && file_exists('../../app/views/layouts/footer.php')){
                $con.= "        View::template('$name_crud/edit', compact('data_$table_crud', 'data_$table_crud"."_edit'));"."\n";
            } else {
                $con.= "        View::render('$name_crud/edit', compact('data_$table_crud', 'data_$table_crud"."_edit'));"."\n";
            }
            /** */
        } else {
            $con.= "        /** Crea este método (a tu manera) si lo consideras necesario */ \n";
        }
        $con.= "    }";
        $con.= "\n";
        $con.= "\n";
        $con.= "    public function create(){"."\n";
        $con.= "        if(Input::all_not_empty()){"."\n";
        $con.= '            $insert = Input::all();'."\n";
        $con.= '            $'."$table_crud"." = new $mayus_table_crud();"."\n";
        foreach($fields_table as $fields_t){
            if($fields_t == $pk_table){
                continue;
            }
            $con.= '            $'."$table_crud"."->".$fields_t." = ".'$insert'."['".App::replace_special_chars($fields_t)."'];"."\n";            
        }
        $con.= '            $'."$table_crud".'->create();'."\n";
        $con.= "            Redirect::to('$name_crud');"."\n";
        $con.= "        } else {"."\n";
        $con.= "            Alert::redirect_back('Completa todos los campos.');"."\n";
        $con.= "        }"."\n";
        $con.= "    }";
        $con.= "\n";
        $con.= "\n";
        $con.= "    public function save(){"."\n";
        if($pk_table != ""){
            $con.= "        if(Input::all_not_empty()){"."\n";
            $con.= '            $update = Input::all();'."\n";
            $con.= '            $'."$table_crud"." = new $mayus_table_crud();"."\n";        
            foreach($fields_table as $fields_t){
                if($fields_t == $pk_table){
                    continue;
                }
                $con.= '            $'."$table_crud"."->".$fields_t." = ".'$update'."['".App::replace_special_chars($fields_t)."'];"."\n";            
            }
            $con.= '            $'."$table_crud".'->save($update['."'$pk_table'".']);'."\n";
            $con.= "            Redirect::to('$name_crud');"."\n";
            $con.= "        } else {"."\n";
            $con.= "            Alert::redirect_back('Completa todos los campos.');"."\n";
            $con.= "        }"."\n";
        } else {
            $con.= "        /** Crea este método (a tu manera) si lo consideras necesario */ \n";
        }
        $con.= "    }";
        $con.= "\n";
        $con.= "\n";
        $con.= "    public function remove(".'$id'."){"."\n";
        if($pk_table != ""){
            $con.= '        $'."$table_crud"." = new $mayus_table_crud();"."\n";
            $con.= '        $'."$table_crud".'->remove($id);'."\n";
            $con.= "        Redirect::to('$name_crud');"."\n";
        } else {
            $con.= "        /** Crea este método (a tu manera) si lo consideras necesario */ \n";
        }
        $con.= "    }";
        $con.= "\n";
        $con.= "\n";
        $con.= "}";
        fwrite($fc, $con);
        fclose($fc);
    }
    
}