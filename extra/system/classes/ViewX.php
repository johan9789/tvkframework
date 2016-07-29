<?php
class ViewX {
    
    public function gen_metro_bootstrap(){
        if(!file_exists('../assets/css/metro-bootstrap-gen.css')){
            $metro = fopen('assets/css/metro-bootstrap-gen.css', 'r');
            $gen_metro = '';
            while(!feof($metro)){
                $traer = fgets($metro);
                $gen_metro = $traer;
            }
            fclose($metro);
            $gen = fopen('../assets/css/metro-bootstrap-gen.css', 'a');
            fwrite($gen, $gen_metro);
            fclose($gen);
        }
    }
    
    public function index_active_record($name_crud, $table_crud, $mayus_table_crud, $fields_table, $pk_table){
        @mkdir("../app/views/$name_crud");
        $fv = fopen("../app/views/$name_crud/index.php", 'a');
        if(!file_exists('../app/views/layouts/header.php')){
            fwrite($fv, "<!DOCTYPE html>"."\n");
            fwrite($fv, '<html>'."\n");
            fwrite($fv, '<head>'."\n");
            fwrite($fv, '<meta charset="UTF8">'."\n");
            fwrite($fv, "<title>$mayus_table_crud</title>"."\n");
            fwrite($fv, "<?php echo HTML::style('css/metro-bootstrap-gen.css'); ?>"."\n");
            fwrite($fv, '</head>'."\n");
            fwrite($fv, '<body>'."\n\n");
        }
        fwrite($fv, '<h3 align="center">Insertar Datos en '.$mayus_table_crud.'</h3>'."\n\n");
        fwrite($fv, "<?php echo Form::open('$name_crud/create'); ?>"."\n");
        fwrite($fv, '    <table align="center">'."\n");
        foreach($fields_table as $fields_t){
            if($fields_t == $pk_table){
                continue;
            }
            fwrite($fv, "        <tr>"."\n");
            fwrite($fv, "            <td>".ucfirst($fields_t).":</td>"."\n");
            fwrite($fv, "            <td><?php echo Form::text('".App::replace_special_chars($fields_t)."'); ?></td>"."\n");
            fwrite($fv, "        </tr>"."\n");
        }
        fwrite($fv, "        <tr><td></td></tr>"."\n");
        fwrite($fv, "        <tr><td></td></tr>"."\n");
        fwrite($fv, "        <tr>"."\n");
        fwrite($fv, "            <td colspan=".'"2"'." align=".'"right"'.">"."\n");
        fwrite($fv, "                <?php echo Form::extra('reset', '', 'Limpiar'); ?>"."\n");
        fwrite($fv, "                <?php echo Form::submit('Insertar'); ?>"."\n");
        fwrite($fv, "            </td>"."\n");
        fwrite($fv, "        </tr>"."\n");
        fwrite($fv, '    </table>'."\n");
        fwrite($fv, "<?php echo Form::close(); ?>"."\n\n");
        fwrite($fv, "<br>"."\n\n");
        fwrite($fv, '<table class="table" align="center" style="width: 300px;">'."\n");
        fwrite($fv, '    <tr>'."\n");
        foreach($fields_table as $fields_t2){
            fwrite($fv, "        <th>".  ucfirst($fields_t2)."</th>"."\n");
        }
        if($pk_table != ""){
            fwrite($fv, '        <th colspan="2" align="center">Opcion</th>'."\n");
        }
        fwrite($fv, '    </tr>'."\n");
        fwrite($fv, "    <?php foreach(".'$data_'.$table_crud." as ".'$data'."): ?>"."\n");
        fwrite($fv, '    <tr>'."\n");
        foreach($fields_table as $fields_t3){    
            fwrite($fv, '        <td><?php echo $data->'.$fields_t3.'; ?></td>'."\n");
        }
        if($pk_table != ""){
            fwrite($fv, "        <td><?php echo HTML::link('$name_crud/edit/'.".'$data->'.$pk_table.", 'Modificar'); ?></td>"."\n");
            fwrite($fv, "        <td><?php echo HTML::link('$name_crud/remove/'.".'$data->'.$pk_table.", 'Eliminar'); ?></td>"."\n");
        }
        fwrite($fv, '    </tr>'."\n");
        fwrite($fv, '    <?php endforeach; ?>'."\n");
        fwrite($fv, '</table>');
        if(!file_exists('../app/views/layouts/header.php') || !file_exists('../app/views/layouts/footer.php')){
            fwrite($fv, "\n\n");
            fwrite($fv, '</body>'."\n");
            fwrite($fv, '</html>');
        }
        fclose($fv);
    }
    
    public function edit_active_record($name_crud, $table_crud, $mayus_table_crud, $fields_table, $pk_table){
        $fv = fopen("../app/views/$name_crud/edit.php", 'a');
        if(!file_exists('../app/views/layouts/header.php')){
            fwrite($fv, "<!DOCTYPE html>"."\n");
            fwrite($fv, '<html>'."\n");
            fwrite($fv, '<head>'."\n");
            fwrite($fv, '<meta charset="UTF8">'."\n");
            fwrite($fv, "<title>$mayus_table_crud</title>"."\n");
            fwrite($fv, "<?php echo HTML::style('css/metro-bootstrap-gen.css'); ?>"."\n");
            fwrite($fv, '</head>'."\n");
            fwrite($fv, '<body>'."\n\n");
        }
        fwrite($fv, '<h3 align="center">Modificar '.$mayus_table_crud.'</h3>'."\n\n");
        fwrite($fv, "<?php echo Form::open('$name_crud/save'); ?>"."\n");
        fwrite($fv, '    <table align="center">'."\n");
        foreach($fields_table as $fields_t){
            if($pk_table == $fields_t){
                fwrite($fv, "        <tr><td><?php echo Form::hidden('$fields_t', ".'$data_'."$table_crud".'_edit->'."$fields_t); ?></td></tr>"."\n");
                continue;
            }
            fwrite($fv, "        <tr>"."\n");
            fwrite($fv, "            <td>".ucfirst($fields_t).":</td>"."\n");
            fwrite($fv, "            <td><?php echo Form::text('".App::replace_special_chars($fields_t)."', ".'$data_'."$table_crud".'_edit->'."$fields_t); ?></td>"."\n");
            fwrite($fv, "        </tr>"."\n");
        }
        fwrite($fv, "        <tr><td></td></tr>"."\n");
        fwrite($fv, "        <tr>"."\n");
        fwrite($fv, "            <td colspan=".'"2"'." align=".'"right"'.">"."\n");
        fwrite($fv, "                <?php echo Form::extra('reset', '', 'Limpiar'); ?>"."\n");
        fwrite($fv, "                <?php echo Form::submit('Actualizar'); ?>"."\n");
        fwrite($fv, "            </td>"."\n");
        fwrite($fv, "        </tr>"."\n");
        fwrite($fv, "        <tr><td></td></tr>"."\n");
        fwrite($fv, "        <tr><td></td></tr>"."\n");    
        fwrite($fv, "        <tr><td colspan=".'"2"'." align=".'"center"'."><?php echo HTML::link('$name_crud', 'Volver a insertar datos'); ?></td></tr>"."\n");
        fwrite($fv, '    </table>'."\n");
        fwrite($fv, "<?php echo Form::close(); ?>"."\n\n");
        fwrite($fv, "<br>"."\n\n");
        fwrite($fv, '<table class="table" align="center" style="width: 300px;">'."\n");
        fwrite($fv, '    <tr>'."\n");
        foreach($fields_table as $fields_t2){
            fwrite($fv, "        <th>".  ucfirst($fields_t2)."</th>"."\n");
        }
        if($pk_table != ""){
            fwrite($fv, '        <th colspan="2" align="center">Opcion</th>'."\n");
        }
        fwrite($fv, '    </tr>'."\n");
        fwrite($fv, "    <?php foreach(".'$data_'.$table_crud." as ".'$data'."): ?>"."\n");
        fwrite($fv, '    <tr>'."\n");
        foreach($fields_table as $fields_t3){    
            fwrite($fv, '        <td><?php echo $data->'.$fields_t3.'; ?></td>'."\n");
        }
        if($pk_table != ""){
            fwrite($fv, "        <td><?php echo HTML::link('$name_crud/edit/'.".'$data->'.$pk_table.", 'Modificar'); ?></td>"."\n");
            fwrite($fv, "        <td><?php echo HTML::link('$name_crud/remove/'.".'$data->'.$pk_table.", 'Eliminar'); ?></td>"."\n");
        }
        fwrite($fv, '    </tr>'."\n");
        fwrite($fv, '    <?php endforeach; ?>'."\n");
        fwrite($fv, '</table>');
        if(!file_exists('../app/views/layouts/header.php') || !file_exists('../app/views/layouts/footer.php')){
            fwrite($fv, "\n\n");
            fwrite($fv, '</body>'."\n");
            fwrite($fv, '</html>');
        }
        fclose($fv);
    }
    
}