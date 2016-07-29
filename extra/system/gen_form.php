<?php
require_once realpath('../../').'/app/config/paths.php';
require_once realpath('../../').'/app/config/other.php';
require_once realpath('../../').'/'.SYSTEM.'util/Functions.php';
require_once realpath('../../').'/'.SYSTEM.'libraries/File.php';
require_once realpath('../../').'/'.SYSTEM.'libraries/Input.php';
require_once realpath('../../').'/'.SYSTEM.'libraries/Redirect.php';
require_once realpath('../../').'/'.SYSTEM.'libraries/Session.php';
require_once realpath('../../').'/'.SYSTEM.'helpers/Form.php';
require_once 'classes/FormX.php';

not_post_method('', true);

$all = Input::all();

$text = $all['text_form'];
$type = $all['select_form'];
$name_form = $all['name_form'];
$options_checkbox = @$all['options'];
$options_radio = @$all['options'];
$options_select = @$all['options'];
$type_form = $all['type_form'];

$formx = new FormX();

switch($type_form){
    case 0:
        $formx->gen_html5_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select);
        Redirect::other('forms.php');        
        break;
    case 1:        
        $formx->gen_classic_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select);
        break;
    case 2:
        // $formx->gen_html5_tvk_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select);
        break;
    case 3:        
        $formx->gen_tvk_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select);
        break;
    default:
        echo '._.';
        break;
}