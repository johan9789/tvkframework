<?php
class ModelX {
    
    public function active_record($table_crud, $mayus_table_crud, $ya_existe_m){
        if(file_exists("../app/models/$mayus_table_crud.php")){
            exit($ya_existe_m);
        }
        $fm = fopen("../app/models/$mayus_table_crud.php", 'a');
        $mod = '<?php'."\n";
        $mod.= "class $mayus_table_crud extends ActiveRecord {}";
        fwrite($fm, $mod);
        fclose($fm);
    }
    
}