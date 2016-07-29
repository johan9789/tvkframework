<?php
/**
 * Clase controladora de ejemplo.
 * Example controller class.
 */
class Home extends MainController {
    
    /**
     * Constructor para cargar la clase modelo de ejemplo.
     * Constructor to load the sample model class.
     */
    public function __construct(){
        $this->load('example');
    }

    /**
     * Método index de ejemplo.
     * Example index method.
     */
    public function index(){
        $title = 'Bienvenido :D';
        $lang = Example::lang();
        $file = Example::get_file();
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