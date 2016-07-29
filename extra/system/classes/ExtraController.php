<?php
class ExtraController {

    public function auth(){
        require 'system/config/config.php';
        require 'system/config/lang.php';
        Session::start();
        if(!Session::has('xxtra_adm_us')){
            Redirect::to('extra');
        }
        if($adm_auth['active'] == false){
            Redirect::to();
        }
    }
    
    public function render($name, array $data = array()){
        require 'system/config/config.php';
        require 'system/config/lang.php';
        if(!is_null($data)){
            extract($data);
        }
        if(file_exists('system/views/'.$name.'.php')){            
            require 'system/views/'.$name.'.php';
        }
        exit();
    }
    
    public function template($name, array $data = array()){
        require 'system/config/config.php';
        require 'system/config/lang.php';
        if(!is_null($data)){
            extract($data);
        }
        if(file_exists('system/views/'.$name.'.php')){
            require 'system/views/layouts/header.php';
            require 'system/views/'.$name.'.php';
            require 'system/views/layouts/footer.php';
        }
        exit();
    }    

}