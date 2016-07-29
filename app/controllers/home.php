<?php
/**
 * Clase controladora de ejemplo.
 * Example controller class.
 */
class Home extends MainController {
    
    /**
     * Método index de ejemplo.
     * Example index method.
     */
    public function index(){
        $this->load('example');
        $title = 'Bienvenido :D';
        $example = new Example();        
        $lang = $example->lang();
        $file = $example->get_file();
        View::template('home', compact('title', 'lang', 'file'));
    }
    
    public function test(){
        $this->load('alimento');
        $alimento = new Alimento();
        $al = $alimento->all();
        $haha = '._.';
        View::test('test', compact('al', 'haha'));
    }
 
    public function test2(){
        View::test2('test2', array('a' => 12));
    }

}