<?php
class Home extends ExtraController {
    
    public function index(){
        require 'system/config/config.php';
        if($adm_auth['active'] == false){
            Redirect::to();
        }
        Session::start();
        if(!Session::has('xlangxlang')){
            Session::set('xlangxlang', 'es');
        }
        $lang = Session::get('xlangxlang');
        $lang_options = [];
        if($lang == 'es'){
            $lang_options = ['es' => 'ES', 'en' => 'EN'];
        } elseif($lang == 'en'){
            $lang_options = ['en' => 'EN', 'es' => 'ES'];
        }
        $this->render('home', compact('lang_options'));
    }
    
    public function lang(){
        Request::post('', true, 'extra');
        Session::start();
        $lang = Input::post('lang');
        Session::set('xlangxlang', $lang);
    }
    
    public function login(){
        require 'system/config/config.php';
        require 'system/config/lang.php';
        $compare['xtra_us_ad'] = $adm_auth['adm_auth_username'];
        $compare['xtra_pwd_ad'] = $adm_auth['adm_auth_password'];
        if(!Input::all_not_empty()){
            Redirect::to('extra');
        }
        if(Input::compare($compare)){
            $xadmin = Input::post('xtra_us_ad');
            Session::start();
            Session::set('xxtra_adm_us', $xadmin);
            Redirect::to('extra/start');
        } else {
            Redirect::to('extra');
        }
    }
    
    public function logout(){
        Session::destroy();
        Redirect::to();
    }

}