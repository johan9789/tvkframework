<?php
class Form extends ExtraController {
	
    public function __construct(){
        $this->auth();
    }

    public function json(){
        $formx = new FormX();
        echo json_encode($formx->get_options());
    }

    public function generate(){
        Request::post('', true, 'extra/start');

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
                Redirect::to('extra/start/forms');
                break;
            case 1:        
                $formx->gen_classic_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select);
                Redirect::to('extra/start/forms');
                break;
            case 2:
                // $formx->gen_html5_tvk_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select);
                Redirect::to('extra/start/forms');
                break;
            case 3:        
                $formx->gen_tvk_form($text, $type, $name_form, $options_checkbox, $options_radio, $options_select);
                Redirect::to('extra/start/forms');
                break;
            default:
                Redirect::to('extra/start/forms');
                break;
        }
    }

    public function generated_form(){
        if(Session::has('created_form')){
            $this->render('generated/common_form');
        } else {
            Redirect::to('extra/start/forms');
        }
    }

    public function generated_tvk_form(){
        if(Session::has('tvk_created_form')){
            $this->render('generated/tvk_form');
        } else {
            Redirect::to('extra/start/forms');
        }
    }

}