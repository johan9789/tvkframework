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
    <span id="first_action" class="<?php write(URL::to('extra/model/create_active_record')); ?>"></span>
    <span id="second_action" class="<?php write(URL::to('extra/model/create_relational_static')); ?>"></span>
    <span id="third_action" class="<?php write(URL::to('extra/model/create_relational_inherited')); ?>"></span>
    <section>
        <h4>
            <span id="<?php write($xlang['model_msj_click']); ?>" class="show_model_act_rec" style="cursor: pointer;">
                <?php write($xlang['model_act_rec']); ?>
            </span> | 
            <span id="<?php write($xlang['model_msj_click']); ?>" class="show_model_rel" style="cursor: pointer;">
                <?php write($xlang['model_rel']); ?>
            </span>
        </h4>
        <table class="table table-striped">
            <tr>
                <th><?php write($xlang['nombre']); ?></th>
                <th align="center"><?php write($xlang['seleccionar']); ?></th>
            </tr>
            <?php foreach($show_tables as $table): ?>
            <tr>
                <?php foreach($table as $names_tables): ?>
                <td><?php echo $names_tables; ?></td>		                
                <td align="center"><?php write(Form::radio('adm_tb_name', $names_tables, false, true, ['id' => 'adm_tb_name'])); ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </table>           
    </section>
</div>