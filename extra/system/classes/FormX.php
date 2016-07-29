<?php
class FormX {
 
    public function get_options(){
        $options['button'] = 'button';
        $options['checkbox'] = 'checkbox';
        $options['color'] = 'color';
        $options['date'] = 'date';
        $options['datetime'] = 'datetime';
        $options['datetime-local'] = 'datetime-local';
        $options['email'] = 'email';
        $options['file'] = 'file';
        $options['hidden'] = 'hidden';
        $options['image'] = 'image';
        $options['month'] = 'month';
        $options['number'] = 'number';
        $options['password'] = 'password';
        $options['radio'] = 'radio';
        $options['range'] = 'range';
        $options['reset'] = 'reset';
        $options['search'] = 'search';
        $options['select'] = 'select';
        $options['submit'] = 'submit';
        $options['tel'] = 'tel';
        $options['text'] = 'text';
        $options['textarea'] = 'textarea';
        $options['time'] = 'time';
        $options['url'] = 'url';
        $options['week'] = 'week';
        return $options;
    }        
    
    public function gen_classic_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select){
        $form = "\n";
        $form.= '<content>'."\n";
        $form.= '    <form method="post" action="" name="'.$name_form.'" style="font-family: Arial;">'."\n";
        $form.= '        <table>'."\n";
        $form.= '            <tr><th colspan="2" align="center">'.ucfirst($name_form).'</th></tr>'."\n";
        for($i=0;$i<count($text);$i++){
            if(!empty($text[$i]) && !empty($type[$i])){        
                if($type[$i] == 'button'){
                    $form.= '            <tr><td align="right" colspan="2"><input value="'.ucfirst($text[$i]).'" type="button" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'checkbox'){
                    $form.= '            <tr>'."\n";            
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $check_sel = $options_checkbox[$i];
                    if(isset($check_sel) && !empty($check_sel)){
                        $check_sel = explode(', ', $check_sel);
                        $form.= '                <td>'."\n";
                        foreach($check_sel as $check){
                            $form.= '                    <input type="checkbox" name="'.$text[$i].'[]" value="'.ucfirst($check).'">'.ucfirst($check).'<br>'."\n";
                        }                
                        $form.= '                </td>'."\n";
                    } else {                
                    }
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'color'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="color" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'date'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="date" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'datetime'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="datetime" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'datetime-local'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="datetime-local" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'email'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="email" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'file'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="file" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'hidden'){
                    $form.= '            <tr><td colspan="2"><input type="hidden" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'image'){
                    $form.= '            <tr><td align="right" colspan="2"><input src="" value="'.ucfirst($text[$i]).'" type="image" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'month'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="month" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'number'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="number" min="" max="" step="" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'password'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="password" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'radio'){
                    $form.= '            <tr>'."\n";            
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $radio_sel = $options_radio[$i];
                    if(isset($radio_sel) && !empty($radio_sel)){
                        $radio_sel = explode(', ', $radio_sel);
                        $form.= '                <td>'."\n";
                        foreach($radio_sel as $radio){
                            $form.= '                    <input type="radio" name="'.$text[$i].'" value="'.ucfirst($radio).'">'.ucfirst($radio).'<br>'."\n";
                        }                
                        $form.= '                </td>'."\n";
                    } else {                
                    }
                    $form.= '            </tr>'."\n";
                }        
                if($type[$i] == 'range'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="range" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'reset'){
                    $form.= '            <tr><td align="right" colspan="2"><input value="'.ucfirst($text[$i]).'" type="reset" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'search'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="search" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'select'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $opt_sel = $options_select[$i];
                    if(isset($opt_sel) && !empty($opt_sel)){
                        $opt_sel = explode(', ', $opt_sel);
                        $form.= '                <td>'."\n";
                        $form.= '                    <select name="'.$text[$i].'">'."\n";
                        foreach($opt_sel as $opt){
                            $form.= '                        <option value="'.ucfirst($opt).'">'.ucfirst($opt).'</option>'."\n";
                        }
                        $form.= '                    </select>'."\n";
                        $form.= '                </td>'."\n";
                    } else {
                        $form.= '                <td><select name="'.$text[$i].'"></select></td>'."\n";
                    }
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'submit'){
                    $form.= '            <tr><td align="right" colspan="2"><input value="'.ucfirst($text[$i]).'" type="submit" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'tel'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="tel" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'text'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="text" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'textarea'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><textarea name="'.$text[$i].'"></textarea></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'time'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="time" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'url'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="url" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'week'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="week" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
            }
        }
        $form.= '        </table>'."\n";
        $form.= '    </form>'."\n";
        $form.= '</content>'."\n";
        
        $name_gen = rand();
        File::create('../../app/generated/forms/form_'.$name_gen.'.php', $form);

        echo $form;
    }
    
    public function gen_html5_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select){
        $form = "\n";
        $form.= '<content>'."\n";
        $form.= '    <form method="post" action="" name="'.$name_form.'">'."\n";
        $form.= '        <fieldset>'."\n";
        $form.= '            <legend>'.ucfirst($name_form).'</legend>'."\n";
        for($i=0;$i<count($text);$i++){
            if(!empty($text[$i]) && !empty($type[$i])){        
                if($type[$i] == 'button'){
                    $form.= '            <p><label><input value="'.ucfirst($text[$i]).'" type="button" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'checkbox'){
                    $form.= '            <p>'."\n";
                    $form.= '                <label>'.ucfirst($text[$i]).':</label>'."\n";
                    $check_sel = $options_checkbox[$i];
                    if(isset($check_sel) && !empty($check_sel)){
                        $check_sel = explode(', ', $check_sel);                        
                        foreach($check_sel as $check){
                            $form.= '                <input type="checkbox" name="'.$text[$i].'[]" value="'.ucfirst($check).'">'."\n";
                            $form.= '                <label>'.ucfirst($check).'</label>'."\n";
                        }                                        
                    }
                    $form.= '            </p>'."\n";
                }
                if($type[$i] == 'color'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="color" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'date'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="date" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'datetime'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="datetime" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'datetime-local'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="datetime-local" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'email'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="email" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'file'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="file" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'hidden'){
                    $form.= '            <p><label><input type="hidden" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'image'){
                    $form.= '            <p><label><input src="" value="'.ucfirst($text[$i]).'" type="image" name="'.$text[$i].'"></p></label>'."\n";
                }
                if($type[$i] == 'month'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="month" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'number'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="number" min="" max="" step="" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'password'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).':</label><input type="password" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'radio'){
                    $form.= '            <p>'."\n";
                    $form.= '                <label>'.ucfirst($text[$i]).':</label>'."\n";
                    $radio_sel = $options_radio[$i];
                    if(isset($radio_sel) && !empty($radio_sel)){
                        $radio_sel = explode(', ', $radio_sel);
                        foreach($radio_sel as $radio){
                            $form.= '                <input type="radio" name="'.$text[$i].'" value="'.ucfirst($radio).'">'."\n";
                            $form.= '                <label>'.ucfirst($radio).'</label>'."\n";
                        }                                        
                    }
                    $form.= '            </p>'."\n";
                }        
                if($type[$i] == 'range'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="range" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'reset'){
                    $form.= '            <p><label><input value="'.ucfirst($text[$i]).'" type="reset" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'search'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="search" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'select'){
                    $form.= '            <p>'."\n";
                    $form.= '                <label>'."\n";
                    $form.= '                    '.ucfirst($text[$i]).': '."\n";
                    $opt_sel = $options_select[$i];
                    if(isset($opt_sel) && !empty($opt_sel)){
                        $opt_sel = explode(', ', $opt_sel);                        
                    $form.= '                    <select name="'.$text[$i].'">'."\n";
                        foreach($opt_sel as $opt){
                    $form.= '                        <option value="'.ucfirst($opt).'">'.ucfirst($opt).'</option>'."\n";
                        }
                    $form.= '                    </select>'."\n";
                    } else {
                    $form.= '                    <select name="'.$text[$i].'"></select>'."\n";
                    }
                    $form.= '                </label>'."\n";
                    $form.= '            </p>'."\n";
                }
                if($type[$i] == 'submit'){
                    $form.= '            <p><label><input value="'.ucfirst($text[$i]).'" type="submit" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'tel'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="tel" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'text'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="text" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'textarea'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <textarea name="'.$text[$i].'"></textarea></label></p>'."\n";
                }
                if($type[$i] == 'time'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="time" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'url'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="url" name="'.$text[$i].'"></label></p>'."\n";
                }
                if($type[$i] == 'week'){
                    $form.= '            <p><label>'.ucfirst($text[$i]).': <input type="week" name="'.$text[$i].'"></label></p>'."\n";
                }
            }
        }
        $form.= '        </fieldset>'."\n";
        $form.= '    </form>'."\n";
        $form.= '</content>'."\n";
        
        $name_gen = rand();
        File::create('../../app/generated/forms/form_'.$name_gen.'.php', $form);

        Session::start();
        Session::set('html5_created_form', $form);
        
        //echo $form;
    }
    
    public function gen_tvk_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select){
        $form = "\n";
        $form.= '<content>'."\n";
        $form.= "    <?php echo Form::open('', 'post', ['name' => '{$name_form}', 'style' => 'font-family: Arial']); ?>"."\n";
        $form.= '        <table>'."\n";
        $form.= '            <tr><th colspan="2" align="center">'.ucfirst($name_form).'</th></tr>'."\n";
        for($i=0;$i<count($text);$i++){
            if(!empty($text[$i]) && !empty($type[$i])){        
                if($type[$i] == 'button'){
                    $form.= '            <tr><td align="right" colspan="2"><?php echo Form::button('."'".ucfirst($text[$i])."'".', '."'{$text[$i]}'".'); ?>'."\n";
                }
                if($type[$i] == 'checkbox'){
                    $form.= '            <tr>'."\n";            
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $check_sel = $options_checkbox[$i];
                    if(isset($check_sel) && !empty($check_sel)){
                        $check_sel = explode(', ', $check_sel);
                        $form.= '                <td>'."\n";
                        foreach($check_sel as $check){
                            $form.= "                    <?php echo Form::checkbox('{$text[$i]}[]', '".ucfirst($check)."'); ?> ".ucfirst($check).'<br>'."\n";
                        }                
                        $form.= '                </td>'."\n";
                    } else {                
                    }
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'color'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="color" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'date'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="date" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'datetime'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="datetime" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'datetime-local'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="datetime-local" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'email'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="email" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'file'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="file" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'hidden'){
                    $form.= '            <tr><td colspan="2"><input type="hidden" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'image'){
                    $form.= '            <tr><td align="right" colspan="2"><input src="" value="'.ucfirst($text[$i]).'" type="image" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'month'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="month" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'number'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="number" min="" max="" step="" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'password'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="password" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'radio'){
                    $form.= '            <tr>'."\n";            
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $radio_sel = $options_radio[$i];
                    if(isset($radio_sel) && !empty($radio_sel)){
                        $radio_sel = explode(', ', $radio_sel);
                        $form.= '                <td>'."\n";
                        foreach($radio_sel as $radio){
                            $form.= '                    <input type="radio" name="'.$text[$i].'">'.ucfirst($radio).'<br>'."\n";
                        }                
                        $form.= '                </td>'."\n";
                    } else {                
                    }
                    $form.= '            </tr>'."\n";
                }        
                if($type[$i] == 'range'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="range" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'reset'){
                    $form.= '            <tr><td align="right" colspan="2"><input value="'.ucfirst($text[$i]).'" type="reset" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'search'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="search" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'select'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $opt_sel = $options_select[$i];
                    if(isset($opt_sel) && !empty($opt_sel)){
                        $opt_sel = explode(', ', $opt_sel);
                        $form.= '                <td>'."\n";
                        $form.= '                    <select name="'.$text[$i].'">'."\n";
                        foreach($opt_sel as $opt){
                            $form.= '                        <option value="'.$opt.'">'.ucfirst($opt).'</option>'."\n";
                        }
                        $form.= '                    </select>'."\n";
                        $form.= '                </td>'."\n";
                    } else {
                        $form.= '                <td><select name="'.$text[$i].'"></select></td>'."\n";
                    }
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'submit'){
                    $form.= '            <tr><td align="right" colspan="2"><input value="'.ucfirst($text[$i]).'" type="submit" name="'.$text[$i].'"></td></tr>'."\n";
                }
                if($type[$i] == 'tel'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="tel" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'text'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="text" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'textarea'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><textarea name="'.$text[$i].'"></textarea></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'time'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="time" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'url'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="url" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
                if($type[$i] == 'week'){
                    $form.= '            <tr>'."\n";
                    $form.= '                <td>'.ucfirst($text[$i]).':</td>'."\n";
                    $form.= '                <td><input type="week" name="'.$text[$i].'"></td>'."\n";
                    $form.= '            </tr>'."\n";
                }
            }
        }
        $form.= '        </table>'."\n";
        $form.= '    </form>'."\n";
        $form.= '</content>'."\n";
        
        $name_gen = rand();
        File::create('../../app/generated/forms/form_'.$name_gen.'.php', $form);

        require_once '../../app/generated/forms/form_'.$name_gen.'.php';
    }
    
}