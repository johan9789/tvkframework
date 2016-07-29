<?php if(Session::has('created_form') && $adm_auth['preview']): ?>
<script type="text/javascript">
window.open('../form/generated_form', '_blank', 'width=1100,height=550,left=125,top=70');
</script>
<?php elseif(Session::has('tvk_created_form') && $adm_auth['preview']): ?>
<script type="text/javascript">
window.open('../form/generated_tvk_form', '_blank', 'width=830,height=550,left=125,top=70');
</script>
<?php endif; ?>

<div class="container">    
    <span id="<?php echo URL::to('extra/form/json'); ?>" class="url_json"></span>
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
    <span id="xlang_fm_name" class="<?php write($xlang['fm_name']); ?>"></span>
    <span id="xlang_fm_type" class="<?php write($xlang['fm_type']); ?>"></span>
    <span id="xlang_optional" class="<?php write($xlang['optional']); ?>"></span>
    <section>     
        <?php if(Session::has('created_form') && !$adm_auth['preview']): ?>
        <script type="text/javascript">
        function gen_form(){
            window.open('../form/generated_form', '_blank', 'width=1100,height=550,left=125,top=70');
            $('#el').remove();
        }
        </script>        
        <?php write(HTML::link('extra/start/forms#', $xlang['ver_form_gen'], ['id' => 'el', 'onclick' => 'gen_form();'])); ?>
        <?php elseif(Session::has('tvk_created_form') && !$adm_auth['preview']): ?>
        <script type="text/javascript">
        function gen_form(){
            window.open('../form/generated_tvk_form', '_blank', 'width=830,height=550,left=260,top=70');
            $('#el').remove();
        }
        </script>
        <?php write(HTML::link('extra/start/forms#', $xlang['ver_form_gen'], ['id' => 'el', 'onclick' => 'gen_form();'])); ?>
        <?php endif; ?>
        <?php write(Form::open('extra/form/generate', 'post', ['id' => 'gen_form'])); ?>
        <h3>
            <span class="show_crud_act_rec" style="cursor: pointer;">
                <?php write($xlang['gen_form']); ?> ... 
                <?php write(Form::text('name_form', '', true, ['style' => 'font-size: 17px;', 'placeholder' => $xlang['name_form'], 'autocomplete' => 'off'])); ?>
                <?php write(Form::select('type_form', $xlang['type_form'], true, ['style' => ''])); ?>
            </span>
        </h3>
        <?php for($i=0;$i<4;$i++): ?>
        <h4 id="fm_all_name">
            <?php write($xlang['fm_name']); ?>: 
            <?php write(Form::text('text_form[]', '', false, ['id' => 'text_form', 'style' => 'font-size: 16px;', 'autocomplete' => 'off'])); ?>
            <?php write($xlang['fm_type']); ?>:
            <?php write(Form::select('select_form[]', $options, false, ['id' => 'select_form', 'style' => 'font-size: 17px;'])); ?>
            <?php write(Form::text('options[]', '', false, ['placeholder' => $xlang['optional'], 'style' => 'width: 230px;', 'autocomplete' => 'off'])); ?>
        </h4>
        <?php endfor; ?>
        <?php write(Form::button($xlang['f_add'], '', ['id' => 'add_val'])); ?>
        <?php write(Form::submit($xlang['gen_t'], 'gen_form_submit', ['id' => 'gen_form_submit'])); ?>
        <?php write(Form::close()); ?>
    </section>
</div>