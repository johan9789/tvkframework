<?php
class Start extends ExtraController {
    private $lang_options = [];

    public function __construct(){
        $this->auth();
        $lang = Session::get('xlangxlang');
        if($lang == 'es'){
            $this->lang_options = ['es' => 'ES', 'en' => 'EN'];
        } elseif($lang == 'en'){
            $this->lang_options = ['en' => 'EN', 'es' => 'ES'];
        }
    }
    
    public function index(){
        $lang_options = $this->lang_options;
        $this->template('start/index', compact('lang_options'));
    }
    
    public function crud(){
        $show_tables = Relational::start()->query('show tables');
        $lang_options = $this->lang_options;
        $this->template('start/crud', compact('show_tables', 'lang_options'));
    }
    
    public function controllers(){
        /** por ahora */
        Redirect::to('extra/start');
    }

    public function models(){        
        $show_tables = Relational::start()->query('show tables');
        $lang_options = $this->lang_options;
        $this->template('start/models', compact('show_tables', 'lang_options'));
    }
    
    public function forms(){
        $formx = new FormX();
        $options = $formx->get_options();
        $lang_options = $this->lang_options;
        $this->template('start/forms', compact('options', 'lang_options'));
    }
    
    public function logout(){
        Session::delete('xxtra_adm_us');
        Redirect::to('extra');
    }
    
}