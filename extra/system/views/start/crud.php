<div class="container">    
    <header class="jumbotron subhead" id="overview">
        <br>
        <div class="subnav">
            <ul class="nav nav-pills">
                <li><a href="#typography"></a></li>
                <li class=""><a href="#code"></a></li>
                <li class=""><a href="#tables"></a></li>
                <li class=""><a href="#forms"></a></li>
            </ul>
        </div>
    </header>
    <section>            
        <h4>
            <span class="show_crud_act_rec" style="cursor: pointer;"><?php echo $xlang['crud_act_rec']; ?></span> | 
            <span class="show_crud_rel" style="cursor: pointer;"><?php echo $xlang['crud_rel_st']; ?></span> |
            <span class="" style="cursor: pointer;"><?php echo $xlang['crud_rel_inh']; ?></span> |
        </h4>
        <table class="table table-striped">
            <tr>
                <th><?php echo $xlang['nombre']; ?></th>
                <th align="center"><?php echo $xlang['seleccionar']; ?></th>
            </tr>
            <?php foreach($show_tables as $table): ?>
            <tr>
                <?php foreach($table as $names_tables): ?>
                <td><?php echo $names_tables; ?></td>		                
                <td align="center"><?php echo Form::radio('adm_tb_name', $names_tables, false, true, ['id' => 'adm_tb_name']); ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </table>           
    </section>
</div>

<!-- Active Record -->    
<div id="window-crud-act-rec" style="width: 300px; position: absolute; top: 230px; left: 50%; margin-left: -128px;">
    <div id="contenedor">
        <div class="contenido">
            <?php echo Form::open('extra/crud/create_active_record', 'post', ['class' => 'well', 'id' => 'form_new_crud_act_rec']); ?>
                <label><b>Active Record</b></label>
                <label><?php echo $xlang['nombre_crud']; ?>:</label>
                <?php echo Form::text('', '', false, ['id' => 'name_new_crud_act_rec', 'class' => 'span3', 'autocomplete' => 'off', 'placeholder' => $xlang['escribe_nombre']]); ?>
                <label><?php echo Form::button($xlang['crear_crud'], '', ['id' => 'btn_new_crud_act_rec', 'class' => 'btn btn-inverse']); ?></label>
            <?php echo Form::close(); ?>
        </div>
    </div>
</div>

<!-- Relational -->
<div id="window-crud-rel" style="width: 300px; position: absolute; top: 230px; left: 50%; margin-left: -128px;">
    <div id="contenedor">
        <div class="contenido">
            <?php echo Form::open('', 'post', ['class' => 'well', 'id' => 'form_new_crud_rel'], false); ?>
                <label><b>Relational</b></label>
                <label><?php echo $xlang['nombre_crud']; ?>:</label>
                <?php echo Form::text('', '', false, ['id' => 'name_new_crud_rel', 'class' => 'span3', 'autocomplete' => 'off', 'placeholder' => $xlang['escribe_nombre']]); ?>
                <label><?php echo Form::button($xlang['crear_crud'], '', ['id' => 'btn_new_crud_rel', 'class' => 'btn btn-inverse']); ?></label>
            <?php echo Form::close(); ?>
        </div>
    </div>
</div>