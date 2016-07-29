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
        $this->load('Example');
    }

    /**
     * Método index de ejemplo.
     * Example index method.
     */
    public function index(){        
        $title = 'Bienvenido :D';
        $file_name = __FILE__;
        $lang = Example::lang();
        $file = Example::get_file();        
        View::template('home/index', compact('title', 'lang', 'file', 'file_name'));
    }
    
    /**
     * Ejemplo usando el motor de plantillas 'twig'.
     * Example using the template engine 'twig'.
     */
    public function twig(){
        $title = 'Bienvenido :D';
        $style = HTML::style('css/metro-bootstrap-gen.css');
        $link = HTML::link('', "<h1>TvK Framework 1.0.2</h1>", ['class' => 'navbar-brand']);
        $descripcion = 'Hasta el momento tenemos las siguientes versiones del framework:';
        $versiones = [
            ['nombre' => 'TvK Framework 1.0'], 
            ['nombre' => 'TvK Framework 1.0.1'], 
            ['nombre' => 'TvK Framework 1.0.2']
        ];
        View::twig('home/twig', compact('title', 'style', 'link', 'descripcion', 'versiones'));
    }
    
    public function test(){
        echo Form::upload('home/upload');
        echo Form::file('archivo');
        echo Form::submit('Subir', 'subir');
        echo Form::close();
    }
    
    public function upload(){
        $file = Input::file('archivo');
        if(!$file){
            exit('No hay archivo ._.');
        }
        echo $file->file().'<br>';
        echo $file->name().'<br>';
        echo $file->size().'<br>';
        echo $file->type().'<br>';
        if($file->validate_type('image/jpeg')){
            echo 'Si es una imagen :D <br>';
        }
        if($file->validate_size('30')){
            echo 'Si :D <br>';
        } else {
            echo 'No ._. <br>';
        }
        $upload = $file->move('', $file->file());
        if($upload){
            echo ':D';
        }
    }

}